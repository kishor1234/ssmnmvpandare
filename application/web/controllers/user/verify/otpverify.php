
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of otpverify
 *
 * @author atharv
 */
require_once controller;

class otpverify extends CAaskController {

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
        $this->id = $this->encript->decdataPass($this->filter($_POST["token"]));
        $this->otp = $this->filter($_POST["otp"]);

        return;
    }

    public function execute() {
        parent::execute();
        if (strcmp($this->otp, $_SESSION["otp"])==0) {
            $sql = $this->select("user", $_SESSION["db_1"]) . $this->whereSingle(array("id" => $this->id));
            $result = $this->executeQuery($sql);
            $active = "";
            if ($row = $result->fetch_assoc()) {
                if (strcmp($row["mobileverify"], "0") == 0) {
                    $sql = $this->update(array("mobileverify" => 1), "user") . $this->whereSingle(array("id" => $this->id));
                    if ($this->executeQuery($sql)) {
                        $this->msg = "Your mobile verification completed, try to login";
                        $active = "1";
                    } else {
                        $this->msg = "Technical Error, try again after some time";
                        $active = "0";
                    }
                } else {
                    $this->msg = "Your mobile was verifyed";
                    $active = "1";
                }
            } else {
                $this->msg = "User not found in our system. Register with us ";
                $active = "0";
            }
            //$this->isLoadView("login", false, array("msg" => $this->msg, "active" => $active));

            echo json_encode(array("status" => $active, "message" => $this->msg));
        } else {
            echo json_encode(array("status" => 0, "message" => "Mobile  verification failed.."));
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
