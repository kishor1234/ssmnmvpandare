<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of generateorder
 *
 * @author atharv
 */
//die(APPLICATION);
//require_once getcwd() . '/' . APPLICATION . "/controllers/Crout.php";
require_once controller;

class generateorder extends CAaskController {

    //put your code here
    public function __construct() {
        parent::__construct();

        if (!isset($_SESSION["uid"])) {
            redirect(HOSTURL . "login");
        }
    }

    public function create() {
        parent::create();



        return;
    }

    public function initialize() {
        parent::initialize();

        foreach ($_POST as $key => $val) {
            $this->postData[$key] = $this->filter($val);
        }
        return;
    }

    public function execute() {
        parent::execute();
        switch ($this->postData["action"]) {
            case "generateorder":
                if (empty($_SESSION["checkout"]) && empty($_SESSION["cart"])) {
                    redirect(HOSTURL . "cart");
                }
                $this->generateorder($this->postData);
                break;
            case "saveprofile":
                $this->saveprofile($this->postData);
                break;
            case "updateprofile":
                $this->updateprofile($this->postData);
                break;
            default:

                $this->isLoadView("showcart", true, array());
                break;
        }
        return;
    }

    public function finalize() {
        parent::finalize();
        return;
    }

    public function reader() {
        parent::reader();
        return;
    }

    public function distory() {
        parent::distory();
        return;
    }

    //custome code 
    function saveprofile($data) {
        //print_r($this->postData);
        $this->adminDB[$_SESSION["db_1"]]->autocommit(false);
        unset($data["action"]);
        $uid = $data["uid"];
        unset($data["uid"]);
        $profileQuery = $this->update($data, "profile") . $this->whereSingle(array("uid" => $uid));
        if ($this->executeQuery($profileQuery)) {
            $this->adminDB[$_SESSION["db_1"]]->commit();
            echo json_encode(array("status" => 1, "message" => "User Information update success.."));
        } else {
            $this->adminDB[$_SESSION["db_1"]]->rollback();
            echo json_encode(array("status" => 0, "message" => "User Information update failed.." . $this->adminDB[$_SESSION["db_1"]]->error));
        }
    }

    /*
      status
     * 1. init //insert to table
     * 2. process //payment is in processs
     * 3. failed //payment fail
     * 4. success //payment success
     * 5. refunded
     * 6. cancel
     * 7. completed
     * 
     *      */

    function generateorder($data) {
        $data["order_id"] = uniqid("TPS");
        $data["ip"] = $_SERVER["REMOTE_ADDR"];
        $data["uid"] = $_SESSION["uid"];
        $data["status"] = "init";
        //gather profile data
        if (strcmp($data["same_address"], "on") == 0) {
            $profile = array(
                "uid" => $data["uid"],
                "fname" => $data["fname"],
                "lname" => $data["lname"],
                "billing_address" => $data["billing_address"],
                "billing_address2" => $data["billing_address2"],
                "billing_country" => $data["billing_country"],
                "billing_state" => $data["billing_state"],
                "billing_zip" => $data["billing_zip"],
                "billing_city" => $data["billing_city"],
                "shipping_address" => $data["shipping_address"],
                "shipping_address2" => $data["shipping_address2"],
                "shipping_country" => $data["shipping_country"],
                "shipping_state" => $data["shipping_state"],
                "shipping_zip" => $data["shipping_zip"],
                "shipping_city" => $data["shipping_city"],
                "gstno" => $data["gstno"],
                "ip" => $data["ip"],
                "action" => "saveprofile"
            );
            $this->saveprofile($profile);
        }
        unset($data["action"]);
        $data["payment_mode"] = $_SESSION["subtotal"]["payment"];
        $data["subtotal"] = $_SESSION["subtotal"]["subtotal"];
        $data["discount_per"] = $_SESSION["subtotal"]["disper"];
        $data["discount"] = $_SESSION["subtotal"]["discount"];
        $data["gst"] = $_SESSION["subtotal"]["gst"];
        $data["final_total"] = $_SESSION["subtotal"]["finaltotal"];
        $this->adminDB[$_SESSION["db_1"]]->autocommit(false);
        $error = array();
        $orderTableId;
        $orderQuery = $this->insert("orders", $_SESSION["db_1"], $data);
        if ($this->executeQuery($orderQuery)) {
            $orderTableId = $this->adminDB[$_SESSION["db_1"]]->insert_id;
            //write order product
            foreach ($_SESSION["cart"] as $key => $val) {
                $tdata = array(
                    "uid" => $_SESSION["uid"],
                    "tid" => $orderTableId,
                    "post_id" => $this->getData("SELECT * FROM `post` WHERE title='{$val["product"]}'", "id"),
                    "order_id" => $data["order_id"],
                    "product" => $val["product"],
                    "area" => $val["area"],
                    "type" => $val["type"],
                    "price" => $val["price"],
                    "disamount" => $val["disamount"],
                    "qty" => $val["qty"],
                    "ip" => $data['ip']
                );
                $sql = $this->insert("orderproduct", $_SESSION["db_1"], $tdata);
                $this->executeQuery($sql) ? true : array_push($error, "cart " . $this->adminDB[$_SESSION["db_1"]]->error);
                $orderProductTableID = $this->adminDB[$_SESSION["db_1"]]->insert_id;
                $selectSql = $this->select("type", $_SESSION["db_1"]) . $this->whereSingle(array("type" => $val["type"]));
                $result = $this->executeQuery($selectSql);
                $row = $result->fetch_assoc();
                $cycle = 3;
                $nextDay = date("Y-m-d", strtotime("+1 day")) . " 10:15:20";
                for ($i = 1; $i <= (int) $row["hms"]; $i++) {
                    $schData = array(
                        "uid" => $_SESSION["uid"],
                        "cid" => $orderProductTableID,
                        "order_id" => $data["order_id"],
                        "schedule" => $nextDay,
                        "createby" => "0",
                        "ip" => $data['ip'],
                        "status" => "schedule"
                    );
                    $nextDay = date("Y-m-d", strtotime("+{$cycle} months")) . " 10:15:20";
                    $sql = $this->insert("schedule", $_SESSION["db_1"], $schData);
                    $this->executeQuery($sql) ? true : array_push($error, "cart " . $this->adminDB[$_SESSION["db_1"]]->error);
                    $cycle += $cycle;
                }
            }
            $this->processPayment($data["order_id"], $data["payment_mode"], $error, $data);
        } else {
            array_push($error, $this->adminDB[$_SESSION["db_1"]]->error);
        }
    }

    function processPayment($order_id, $mode, $error, $data) {
        switch ($mode) {
            case "Online":

                $rawData = $this->paymentRazorPay($order_id, $mode, $error, $data);
                $this->adminDB[$_SESSION["db_1"]]->commit();
                $this->isLoadView("process", false, array("data" => $rawData));
                break;
            case "Cash on delivery":
                $sql = $this->update(array("status" => "Success"), "orders") . $this->whereSingle(array("order_id" => $order_id));
                $this->executeQuery($sql) ? true : array_push($error, $this->adminDB[$_SESSION["db_1"]]->error);
                if (empty($error)) {
                    $_SESSION["cart"] = array();
                    $_SESSION["subtotal"] = array();
                    $_SESSION["checkout"] = array();
                    $this->adminDB[$_SESSION["db_1"]]->commit();
                    $html = "<p>Your payment was successful</p><p>Order ID: {$order_id}</p>";
                    $this->isLoadView("success", true, array("ttl" => "Cash on Dilevry order Success..", "msg" => $html, "order_id" => $order_id));
                } else {
                    $this->adminDB[$_SESSION["db_1"]]->rollback;
                    //print_r($error);
                    $er = json_encode($error);
                    $html = "<p>Your payment failed</p><p>{$er}</p>";
                    $this->isLoadView("success", true, array("ttl" => "Payment Failed..", "msg" => $html, "order_id" => $order_id));
                }
                break;
            default :
                $this->adminDB[$_SESSION["db_1"]]->rollback();

                $html = "<p>Your payment failed, Error Kindly contact support@tahaanpestsolutions.com</p><p></p>";
                $this->isLoadView("success", true, array("ttl" => "Payment Failed..", "msg" => $html));

                break;
        }
    }

}
