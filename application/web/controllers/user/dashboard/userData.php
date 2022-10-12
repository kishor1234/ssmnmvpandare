<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author asksoft
 */
//die(APPLICATION);
//require_once getcwd() . '/' . APPLICATION . "/controllers/Crout.php";
require_once controller;

class userData extends CAaskController {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function create() {
        parent::create();
        //session_destroy();
        //print_r($_SESSION);die;
        if (!isset($_SESSION["uid"])) {
            redirect(HOSTURL . "login");
        }
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
            case "loadYourOrder":
                $this->loadYourOrder();
                break;
            case "changeSchedule":
                $this->changeSchedule();
                break;
            case "changepassword":
                $this->changepassword();
                break;

            default:
                $this->postData["status"] = "all";
                $this->loadYourOrder();
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

    //custome code for switch

    function changepassword() {
        $data["password"] = password_hash($this->filter($_POST["pwd"]), PASSWORD_DEFAULT);
        $sql = $this->select("user", $_SESSION["db_1"]) . $this->whereSingle(array("id" => $this->postData["id"]));
        $result = $this->executeQuery($sql);
        if ($row = $result->fetch_assoc()) {
            
            if (password_verify($this->postData["old"], $row["password"])) {
                
                if ($this->executeQuery($this->update($data, "user") . $this->whereSingle(array("id" => $this->postData["id"])))) {
                    session_destroy();
                    echo json_encode(array("status" => 0, "message" => "password change succesfully."));
                } else {
                    echo json_encode(array("status" => 0, "message" => "invalid password. kindly contact support@thannapestsolutions.com"));
                }
            } else {
                 
                echo json_encode(array("status" => 0, "message" => "invalid password."));
            }
        } else {
            echo json_encode(array("status" => 0, "message" => "invalid password. kindly contact support@thannapestsolutions.com"));
        }
    }

    function changeSchedule() {
        $data = $this->postData;
        
        $data["schedule"]=date("Y-m-d H:i:s", strtotime($this->postData["schedule"]));
        unset($data["action"]);
        unset($data["id"]);
        $sql = $this->update($data, "schedule") . $this->whereSingle(array("id" => $this->postData["id"]));
        if ($this->executeQuery($sql)) {
            ob_start(); //Start remembering everything that would normally be outputted, but don't quite do anything with it yet

            $htitle = "User update schedule.";
            $msge = "<p>Hello sir,</p>";
            $msge .= "<p>I was update my service schedule. My new updated schedule are {$this->postData["schedule"]}.<br>{$this->postData["modify_reson"]}<br></p>";
            $sql = "SELECT orders.lname,orders.uid,orders.fname,user.email,user.mobile,schedule.order_id,orderproduct.product,orderproduct.area,orderproduct.type,post.img FROM orders INNER JOIN `user` ON orders.uid=user.id INNER JOIN schedule ON orders.id=schedule.cid INNER JOIN orderproduct on schedule.cid=orderproduct.id INNER JOIN post on orderproduct.product=post.title WHERE orders.order_id=(SELECT `order_id` FROM `schedule` WHERE `schedule`.id='{$this->postData["id"]}') AND post.category='Booking'";
            $result = $this->executeQuery($sql);
            if ($row = $result->fetch_assoc()) {
                $msge .= "<img src='{$row["image"]}' style='width:200px; height:auto;'>";
                $msge .= "<table>";
                $msge .= "<tr><th>Name: </th><th>:</th><td>{$row["fname"]} {$row["lname"]}</td></tr>";
                $msge .= "<tr><th>Email: </th><th>:</th><td>{$row["email"]}</td></tr>";
                $msge .= "<tr><th>Mobile: </th><th>:</th><td>{$row["mobile"]}</td></tr>";
                $msge .= "<tr><th>Order ID: </th><th>:</th><td>{$row["order_id"]}</td></tr>";
                $msge .= "<tr><th>Product: </th><th>:</th><td>{$row["product"]}</td></tr>";
                $msge .= "<tr><th>Area: </th><th>:</th><td>{$row["area"]}</td></tr>";
                $msge .= "<tr><th>Type: </th><th>:</th><td>{$row["type"]}</td></tr>";
                $msge .= "</table>";
                $link = "/?r=orderdetails&id={$row["order_id"]}";
                $notify = array(
                    "link" => $link,
                    "uid" => $row["uid"],
                    "msg" => $row["fname"] . " " . $row["lname"] . "<br> Change their service scheduel.",
                    "image" => $row["img"],
                    "isRead" => 0
                );
                $notifyQuery = $this->insert("adminnotify", $_SESSION["db_1"], $notify);
                $this->executeQuery($notifyQuery);
            }
            $msge .= "<p>Thank you<br>{$_SESSION["fname"]} {$_SESSION["lname"]}<br>{$_SESSION["uemail"]}</p>";
            require getcwd() . "/email/common.php";
            $message = ob_get_contents(); //Gives whatever has been "saved"
            $this->sendmailWithoutAttachment($this->mailObject, $_SESSION["email"], "info@tahaanpestsolutions.com", "Tahaan Pest Solutions", $message, "User update service schedule");

            ob_end_clean(); //Stops saving things and discards whatever was saved
            ob_flush(); //Stops saving and outputs it all at once

            echo json_encode(array("status" => 1, "message" => "Success " . $sql, "id" => $this->postData["id"], "schedule" => $data["schedule"]));
        } else {
            echo json_encode(array("status" => 0, "message" => $this->adminDB[$_SESSION["db_1"]]->error));
        }
    }

    function loadYourOrder() {
        $dataArray = array();
        $sql = "";
        if (strcmp($this->postData["status"], "all") == 0) {
            $sql = "SELECT * FROM `orders` WHERE uid='{$_SESSION["uid"]}' AND onCreate LIKE '%{$this->postData["year"]}%'";
        } else if (strcmp($this->postData["status"], "Canceled") == 0) {
            $sql = "SELECT * FROM `orders` WHERE uid='{$_SESSION["uid"]}' AND status='{$this->postData["status"]}' OR status='Failed' OR status='Refund' OR status='init' AND onCreate LIKE '%{$this->postData["year"]}%'";
        } else {
            $sql = "SELECT * FROM `orders` WHERE uid='{$_SESSION["uid"]}' AND status='{$this->postData["status"]}' OR status='Completed' AND onCreate LIKE '%{$this->postData["year"]}%'";
        }
        $sql .= $this->orderBy("DESC", "id");
        $result = $this->executeQuery($sql);

        $message = "";
        while ($row = $result->fetch_assoc()) {
            $innerQuery = "SELECT post.img,orderproduct.product,orderproduct.id,orderproduct.order_id,orderproduct.area,orderproduct.type,orderproduct.price FROM `post` INNER JOIN `orderproduct` ON orderproduct.post_id=post.post_id WHERE orderproduct.order_id='{$row["order_id"]}'";
            //$innerQuery = "SELECT post.img,orderproduct.product,orderproduct.id,orderproduct.area,orderproduct.type,orderproduct.price,schedule.schedule,schedule.modify,schedule.modify_reson,schedule.assign,schedule.status FROM `post` INNER JOIN `orderproduct` ON orderproduct.post_id=post.post_id INNER JOIN `schedule` ON orderproduct.id=schedule.id WHERE orderproduct.order_id='{$row["order_id"]}'";
            $innerResult = $this->executeQuery($innerQuery);
            $row["product"] = array();

            while ($innerRow = $innerResult->fetch_assoc()) {
                array_push($row["product"], $innerRow);
            }

            ob_start();
            $this->isLoadView("orderdata", false, array("order" => $row));
            $message .= ob_get_contents();
            array_push($dataArray, $row);
            ob_end_clean(); //Stops saving things and discards whatever was saved
        }

        ob_flush(); //Stops saving and outputs it all at once
        //echo $message;
//print_r($dataArray);
        echo json_encode(array("status" => 1, "data" => $dataArray, "message" => $message));
    }

}
