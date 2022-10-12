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

class createuser extends CAaskController {

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

            $this->postData["email"] = $this->filter($_POST["email"]);
            $this->postData["mobile"] = $this->filter($_POST["mobile"]);
            $this->postData["password"] = password_hash($this->filter($_POST["password"]), PASSWORD_DEFAULT);
            $this->postData["emailverify"] = $this->filter($_POST["emailverify"]);

            //$this->password_confirm = $this->filter($_POST["password_confirm"]);
        } catch (Exception $ex) {
            
        }
        return;
    }

    public function execute() {
        parent::execute();
        try {
            $data = array();
            $sql = $this->insert("user", $_SESSION["db_1"], $this->postData);
            if ($this->adminDB[$_SESSION["db_1"]]->query($sql)) {
                $_SESSION["otp"] = rand(1000, 9999);
                $email = $this->postData["email"];
                $this->jsonRespon(sms_url."/SMS/{$this->postData["mobile"]}/{$_SESSION["otp"]}/mobileverification", array());
                $token = $this->encript->encdataPass($this->adminDB[$_SESSION["db_1"]]->insert_id);
                $url = HOSTURL . "emailverify/" . $token;
                ob_start(); //Start remembering everything that would normally be outputted, but don't quite do anything with it yet
                require getcwd() . "/email/verify.php";
                $message = ob_get_contents(); //Gives whatever has been "saved"
                if(!$this->postData["emailverify"]){
                    $this->sendmailWithoutAttachment($this->mailObject, $email, "info@tahaanpestsolutions.com", "Tahaan Pest Solutions", $message, "Email Verification from Tahaan Pest Solution");
                }
                ob_end_clean(); //Stops saving things and discards whatever was saved
                ob_flush(); //Stops saving and outputs it all at once

                $data = array(
                    "token" => $token,
                    "status" => 1,
                    "message" => "Account create successfully, please check email for email verification and enter otp for mobile verification."
                );
            } else {
                $data = array(
                    "status" => 0,
                    "message" => "{$this->adminDB[$_SESSION["db_1"]]->error}Account create failed.., try again"
                );
            }
            echo json_encode($data);
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
