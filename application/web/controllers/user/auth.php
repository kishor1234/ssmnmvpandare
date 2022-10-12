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

class auth extends CAaskController {

    public $test = '{"email":"aasksoftware@gmail.com","familyName":"Ask","gender":null,"givenName":"Aask_Software_Solution","hd":null,"id":"104744941940410929736","link":null,"locale":"en","name":"Aask_Software_Solution Ask","picture":"https:\/\/lh3.googleusercontent.com\/a-\/AOh14Gj2rMVf-CNK_XfgpfCjCJSGgyaHGpzSGUovaPoI=s96-c","verifiedEmail":true}';

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

        return;
    }

    public function execute() {
        parent::execute();
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $this->google->setAccessToken($token['access_token']);
            // getting profile information
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            // showing profile info
            $user = array(
                "email" => $google_account_info->email,
                "gid" => $google_account_info->id,
                "fname" => $google_account_info->givenName,
                "lanme" => $google_account_info->familyName,
                "gender" => $google_account_info->gender
            );
            $row = $this->isUser($user);
            if ($row) {
                $sql = "SELECT * FROM `user` INNER JOIN `profile` ON profile.uid=user.id WHERE user.email='{$user["email"]}'";
                $result = $this->executeQuery($sql);
                if ($row = $result->fetch_assoc()) {
                    $this->checkVerification($row);
                }
            } else {
                $this->isLoadView("login", false, array("active" => "active", "email" => $user["email"], "gid" => $user["gid"]));
            }
        }

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
                $this->jsonRespon(sms_url . "/SMS/{$this->postData["mobile"]}/{$_SESSION["otp"]}/mobileverification", array());

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
            $this->jsonRespon(sms_url . "/SMS/{$this->postData["mobile"]}/{$_SESSION["otp"]}/mobileverification", array());

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

    function isUser($user) {
        $sql = $this->select("user", $_SESSION["db_1"]) . $this->whereSingle(array("email" => $user["email"]));
        $result = $this->adminDB[$_SESSION["db_1"]]->query($sql);
        if ($row = $result->fetch_assoc()) {
            return $row;
        } else {
            return false;
        }
    }

    public function finalize() {
        //parent::finalize();
        return;
    }

    public function reader() {
        //parent::reader();
        return;
    }

    public function distory() {
        //parent::distory();
        return;
    }

}
