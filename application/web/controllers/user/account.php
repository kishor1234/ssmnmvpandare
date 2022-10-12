<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author atharv
 */
require_once controller;

class account extends CAaskController {

    private $email = "";
    private $password = "";

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

        $this->email = $this->filter($_POST["email"]);
        $this->password = $this->filter($_POST["password"]);

        return;
    }

    public function execute() {
        parent::execute();
        $sql = "SELECT * FROM `user` INNER JOIN `profile` ON profile.uid=user.id WHERE user.email='{$this->email}'";
//        $sql = $this->select("user", $_SESSION["db_1"]) . $this->whereSingle(array("email" => $this->email)) . $this->limitWithOutOffset(1);
        $result = $this->executeQuery($sql);
        $active = "";
        if ($row = $result->fetch_assoc()) {
            $data = $this->checkLoginUser($row);
            if ($data != null) {
                //header("HTTP/1.1 200 OK");
                echo json_encode($data);
                die;
            } else {
                //header("HTTP/1.1 401 Invalid username or password");
                echo json_encode(array("status" => 0, "message" => "Invalid username or password"));
            }
        } else {

            //header("HTTP/1.1 401 Invalid username or password");
            echo json_encode(array("status" => 0, "message" => "Invalid username or password "));
        }
        //$this->isLoadView("login", false, array("msg" => $this->msg, "active" => $active));
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

    function checkVerification($postData) {
        //print_r($postData);die;
        $data = array();
        if (strcmp($postData["emailverify"], "0") == 0) {
            $email = $postData["email"];
            $token = $this->encript->encdataPass($postData["id"]);
            $url = HOSTURL . "emailverify/" . $token;
            ob_start(); //Start remembering everything that would normally be outputted, but don't quite do anything with it yet
            require getcwd() . "/email/verify.php";
            $message = ob_get_contents(); //Gives whatever has been "saved"
            ob_end_clean(); //Stops saving things and discards whatever was saved
            ob_flush(); //Stops saving and outputs it all at once
            ob_clean();
            $this->sendmailWithoutAttachment($this->mailObject, $email, "info@tahaanpestsolutions.com", "Tahaan Pest Solutions", $message, "Email Verification from Tahaan Pest Solution");


            $data["emailverify"] = 0;
            if (strcmp($postData["mobileverify"], "0") == 0) {
                $_SESSION["otp"] = rand(1000, 9999);
                $this->jsonRespon(sms_url."/SMS/{$this->postData["mobile"]}/{$_SESSION["otp"]}/mobileverification", array());
                
                $data["mobileverify"] = 0;
                $token = $this->encript->encdataPass($postData["id"]);
                $data["msg"] = "Your email or mobile verification is pending, verify ones to loign";
                $data["url"] = "/verify/{$token}";
            } else {
                $data["status"] = 0;
                $data["url"] = "/login";
                $data["msg"] = "Login Success, Please verify your email. {$email}";
            }
        } else if (strcmp($postData["mobileverify"], "0") == 0) {
            $_SESSION["otp"] = rand(1000, 9999);
            $this->jsonRespon(sms_url."/SMS/{$this->postData["mobile"]}/{$_SESSION["otp"]}/mobileverification", array());
                
            $data["mobileverify"] = 0;
            $token = $this->encript->encdataPass($postData["id"]);
            $data["msg"] = "Your email or mobile verification is pending, verify ones to loign";
            $data["url"] = "/verify/{$token}";
        } else if (strcmp($postData["status"], "0") == 0) {
            $sql = $this->update(array("status" => 1), "user") . $this->whereSingle(array("id" => $postData["id"]));
            if ($this->executeQuery($sql)) {
                $data["status"] = 1;
                $data["url"] = "/dashboard";

                $data["msg"] = "Login Success";
                $_SESSION["uid"] = $postData["id"];
                $_SESSION["uemail"] = $postData["email"];
                $_SESSION["umobile"] = $postData["mobile"];
                unset($postData["id"]);
                unset($postData["email"]);
                unset($postData["mobile"]);
                unset($postData["password"]);
                foreach ($postData as $key => $val) {
                    $_SESSION[$key] = $val;
                }
            } else {
                $data["status"] = 2;
                $data["msg"] = "System Error try after some time";
                $data["url"] = "/login";
            }
        } else {
            $data["status"] = 1;
            $data["msg"] = "Login Success";
            $data["url"] = "/dashboard";
            $_SESSION["uid"] = $postData["id"];
            $_SESSION["uemail"] = $postData["email"];
            $_SESSION["umobile"] = $postData["mobile"];
            unset($postData["id"]);
            unset($postData["email"]);
            unset($postData["mobile"]);
            unset($postData["password"]);
            foreach ($postData as $key => $val) {
                $_SESSION[$key] = $val;
            }
        }
        //print_r($data);
        return $data;
    }

    function checkLoginUser($postData) {

        $data = null;
        try {
            if (password_verify($this->password, $postData["password"])) {
                if ($vdata = $this->checkVerification($postData)) {
                    $_SESSION["msg"] = $vdata["msg"];
                    $data = array("url" => $vdata["url"], "status" => 1, "message" => $vdata["msg"], "_id" => $postData["id"], "mobile" => $postData["mobile"], "email" => $postData["email"]);
                }
            } else {
                $data = null;
            }
        } catch (Exception $ex) {
            $data = null;
        }
        return $data;
    }

}
