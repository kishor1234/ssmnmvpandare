<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author asksoft
 */
//die(APPLICATION);
//require_once getcwd() . '/' . APPLICATION . "/controllers/Crout.php";
require_once controller;

class paymentverify extends CAaskController {

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
        //print_r($_POST);
        $status = $this->verifyPayment();
        $error = array();
        if ($status["status"] == true) {
            $sql = $this->update(array("status" => "Success", "payment_id" => $_POST["razorpay_payment_id"], "razorpay_order_id" => $_POST["razorpay_order_id"]), "orders") . $this->whereSingle(array("order_id" => $_POST["shopping_order_id"]));
            $this->executeQuery($sql) ? true : array_push($error, $this->adminDB[$_SESSION["db_1"]]->error);
        } else {
            $sql = $this->update(array("status" => "Failed", "payment_id" => $_POST["razorpay_payment_id"], "razorpay_order_id" => $_POST["razorpay_order_id"]), "orders") . $this->whereSingle(array("order_id" => $_POST["shopping_order_id"]));
            $this->executeQuery($sql) ? true : array_push($error, $this->adminDB[$_SESSION["db_1"]]->error);
        }

        if (empty($error)) {
            $_SESSION["cart"] = array();
            $_SESSION["subtotal"] = array();
            $_SESSION["checkout"] = array();
            $html = "<p>Your payment was successful</p><p>Payment ID: {$_POST['razorpay_payment_id']}</p><p>Order ID: {$_POST['shopping_order_id']}</p>";
            $this->isLoadView("success", true, array("ttl" => "Payment Success..", "msg" => $html,"order_id"=>$_POST["shopping_order_id"]));
            //shoot mail and sms
        } else {
            $html = "<p>Your payment failed</p><p>{$status["error"]}</p>";
            $this->isLoadView("success", true, array("ttl" => "Payment Failed..", "msg" => $html,"order_id"=>$_POST["shopping_order_id"]));
        }

//$this->isLoadView("otpverify", false, array());
        return;
    }

    public function execute() {
        parent::execute();
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

}
