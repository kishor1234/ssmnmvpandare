<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of emailverify
 *
 * @author atharv
 */
require_once controller;

class emailverify extends CAaskController {

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
        $this->id = $this->encript->decdataPass($_REQUEST["v"]);

        return;
    }

    public function execute() {
        parent::execute();
        $sql = $this->select("user", $_SESSION["db_1"]) . $this->whereSingle(array("id" => $this->id));
        $result = $this->executeQuery($sql);
        $active = "";
        if ($row = $result->fetch_assoc()) {
            if (strcmp($row["emailverify"], "0") == 0) {
                $sql = $this->update(array("emailverify" => 1), "user") . $this->whereSingle(array("id" => $this->id));
                if ($this->executeQuery($sql)) {
                    $this->msg = "Your email verification completed, try to login";
                    $active = "";
                } else {
                    $this->msg = "Technical Error, try again after some time";
                    $active = "";
                }
            } else {
                $this->msg = "Your email was verifyed";
                $active = "";
            }
        } else {
            $this->msg = "User not found in our system. Register with us ";
            $active = "active";
        }
        $this->isLoadView("login", false, array("msg" => $this->msg, "active" => $active));
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
