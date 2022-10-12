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

class resendotp extends CAaskController {

    private $postData = array();

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
        try {

            $this->id = $this->encript->decdataPass($_REQUEST["v"]);
        } catch (Exception $ex) {
            
        }
        return;
    }

    public function execute() {
        parent::execute();
        try {
            $sql = $this->select("user", $_SESSION["db_1"]) . $this->whereSingle(array("id" => $this->id));
            $result = $this->executeQuery($sql);
            $active = "";
            if ($row = $result->fetch_assoc()) {
                if (strcmp($row["mobileverify"], "0") == 0) {
                    $_SESSION["otp"] = rand(1000, 9999);
                    //https://2factor.in/API/V1/{api_key}/SMS/{phone_number}/{otp}/{template_name}
                    $this->jsonRespon(sms_url."/SMS/{$row["mobile"]}/{$_SESSION["otp"]}/mobileverification", array());
                    echo json_encode(array("status" => 1, "message" => "OTP Sent"));
                } else {
                    $this->msg = "Your mobile was verifyed";
                    echo json_encode(array("status" => 0, "message" => "OTP not Sent"));
                }
            } else {
                $this->msg = "User not found in our system. Register with us ";
                $active = "active";
                echo json_encode(array("status" => 1, "message" => $this->msg));
            }
            //$this->isLoadView("login", false, array("msg" => $this->msg, "active" => $active));
        } catch (Exception $ex) {
            
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

}
