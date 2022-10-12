<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cart
 *
 * @author atharv
 */
//die(APPLICATION);
//require_once getcwd() . '/' . APPLICATION . "/controllers/Crout.php";
require_once controller;

class cart extends CAaskController {

    //put your code here
    public function __construct() {
        parent::__construct();
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
            case "addtocart":
                $this->addtocart($this->postData);
                break;
            case "cartcount":
                echo json_encode(array("status" => 1, "ct" => count($_SESSION["cart"])));
                break;
            case "subtotal":
                $this->subtotal();
                break;
            case "removeall":
                $cart = array();

                $_SESSION["cart"] = $cart;
                echo json_encode(array("status" => 1, "message" => "Success"));

                break;
            case "remove":
                $cart = array();
                $i = 1;
                foreach ($_SESSION["cart"] as $key => $val) {
                    if (strcmp($val["id"], $_POST["id"]) != 0) {
                        $val["id"] = $i;
                        array_push($cart, $val);
                        $i++;
                    }
                }
                $_SESSION["cart"] = $cart;
                echo json_encode(array("status" => 1, "message" => "Success"));

                break;
            case "validzip":
                $this->validzip();
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
    function addtocart($data) {
        unset($data["action"]);
        $data["id"] = count($_SESSION["cart"]) + 1;
        array_push($_SESSION["cart"], $data);
        if (!empty($_SESSION["cart"])) {
            echo json_encode(array("status" => 1, "message" => "Success.."));
        } else {
            echo json_encode(array("status" => 0, "message" => "Failed.."));
        }
    }

    function subtotal() {
        $payment = $this->postData["paymenttype"];
        $subtotal = 0;
        foreach ($_SESSION["cart"] as $key => $val) {
            $subtotal += (float) $val["price"];
        }
        $discount = 0;
        $insubtotal = $subtotal;
        if (strcmp($payment, "Online") == 0) {
            $discount = (float) $subtotal * ((float) $_SESSION["discount"] / 100);
            $subtotal -= (float) $discount;
            $disper = $_SESSION["discount"];
            //gst
        } else {
            $disper = 0;
        }
        $gst = (float) $subtotal * (18 / 100);
        $finaltotal = (float) $subtotal + (float) $gst;
        $_SESSION["subtotal"] = array(
            "payment" => $payment,
            "subtotal" => round($insubtotal, 2),
            "disper" => round($disper, 2),
            "discount" => round($discount, 2),
            "gst" => round($gst, 2),
            "finaltotal" => round($finaltotal, 2)
        );
        $_SESSION["checkout"] = array();
        array_push($_SESSION["checkout"], $_SESSION["cart"]);
        array_push($_SESSION["checkout"], $_SESSION["subtotal"]);
        echo json_encode(array("status" => 1, "message" => "Success", "data" => $_SESSION["checkout"]));
    }

    function validzip() {
        $sql = $this->select("serve_pin", $_SESSION["db_1"]) . $this->whereSingle(array("pin" => $this->postData["zip"]));
        $result = $this->executeQuery($sql);
        if ($row = $result->fetch_assoc()) {
            echo json_encode(array("status" => 1, "message" => "Success"));
        } else {
            echo json_encode(array("status" => 0, "message" => "failed"));
        }
    }

}
