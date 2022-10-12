<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once controller;

class C_ConfirmBooking extends CAaskController {

    //put your code here
    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION["login"])) {
            redirect(HOSTURL);
        }
    }

    public function create() {
        parent::create();
        return;
    }

    public function initialize() {
        parent::initialize();
        try {
            $sql = $this->update(array("status" => 1), "booking") . $this->whereSingle(array("id" => $_REQUEST["id"]));
            if ($this->adminDB[$_SESSION["db_1"]]->query($sql)) {
                $_SESSION["msg"]=$this->printMessage("Success..", "success");
            } else {
                $_SESSION["msg"]=$this->printMessage("Faild..", "danger");
            }
        } catch (Exception $ex) {
            
        }
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

    function isValidate() {
        return true;
    }

}
