<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of resetRequest
 *
 * @author atharv
 */
require_once controller;

class resetRequest extends CAaskController {

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

        return;
    }

    public function execute() {
        parent::execute();
        $sql = $this->select("user", $_SESSION["db_1"]) . $this->whereSingle(array("email" => $this->email)) . $this->limitWithOutOffset(1);
        $result = $this->executeQuery($sql);
        $status = 0;
        $this->msg = "User not found in our system. Register with us ";
        if ($row = $result->fetch_assoc()) {
            $email = $row["email"];
            $selectedTime = date("Y-m-d h:i:sa");
            $endTime = strtotime("+30 minutes", strtotime($selectedTime));
            $token = $this->encript->encdataPass($row["id"] . "~" . $endTime);
            $url = HOSTURL . "resetpassword/" . $token;
            ob_start(); //Start remembering everything that would normally be outputted, but don't quite do anything with it yet
            require getcwd() . "/email/resetpassword.php";
            $message = ob_get_contents(); //Gives whatever has been "saved"
            $this->sendmailWithoutAttachment($this->mailObject, $email, "info@tahaanpestsolutions.com", "Tahaan Pest Solutions", $message, "Email Verification from Tahaan Pest Solution");

            ob_end_clean(); //Stops saving things and discards whatever was saved
            ob_flush(); //Stops saving and outputs it all at once
            $this->msg = "Password reset link sent successfully on you email.";
            $status = 1;
        }
        echo json_encode(array("status" => $status, "message" => $this->msg));
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

}
