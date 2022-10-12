<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once controller;

class C_CreateAreaServed extends CAaskController {

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
            switch ($_POST["action"]) {
                case "save":
                    $this->save();
                    break;
                case "update":
                    $this->updateArea();
                    break;
            }
        } catch (Exception $ex) {
            
        }
        return;
    }

    public function execute() {
        parent::execute();
        $this->isLoadView("VAreasServedTable", FALSE, array());
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

    function updateArea() {
        if ($this->isValidate()) {
            if (!isset($_POST["served"])) {
                $_POST["served"] = "off";
            }
            if (!isset($_POST["popular"])) {
                $_POST["popular"] = "off";
            }
            unset($_POST["action"]);
            $id = $_POST["id"];
            unset($_POST["id"]);
            $_POST["ip"] = $_SERVER["REMOTE_ADDR"];
            $sql = $this->update($_POST, "areaserved") . $this->whereSingle(array("id" => $id));
            if ($this->adminDB[$_SESSION["db_1"]]->query($sql)) {
                $_SESSION["msg"] = $this->printMessage("Success......!", "success");
            } else {
                $_SESSION["msg"] = $this->printMessage("Error on data update......!", "warning");
            }
        } else {
            $_SESSION["msg"] = $this->printMessage("Validation Error", "danger");
        }
    }

    function save() {
        if ($this->isValidate()) {
            unset($_POST["action"]);
            unset($_POST["action"]);
            $id = $_POST["id"];
            unset($_POST["id"]);
            $_POST["ip"] = $_SERVER["REMOTE_ADDR"];
            if ($this->adminDB[$_SESSION["db_1"]]->query($this->insert("areaserved", $_SESSION["db_1"], $_POST))) {
                $_SESSION["msg"] = $this->printMessage("Success......!", "success");
            } else {
                $_SESSION["msg"] = $this->printMessage("Error on data insert......!", "warning");
            }
        } else {
            $_SESSION["msg"] = $this->printMessage("Validation Error", "danger");
        }
    }

    function isValidate() {
        return true;
    }

}
