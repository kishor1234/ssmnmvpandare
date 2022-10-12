<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once controller;

class C_CreatePrise extends CAaskController {

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
            $result = $this->adminDB[$_SESSION["db_1"]]->query($this->select("price", $_SESSION["db_1"]) . $this->where(array( "pest" => $_POST["pest"], "area" => $_POST["area"], "type" => $_POST["type"]), "AND"));
            if (($row = $result->fetch_assoc()) != null) {
                $_SESSION["msg"] = $this->printMessage("Please update prise for existing entry", "danger");
            } else {
                $this->check();
            }
        } catch (Exception $ex) {
            
        }
        return;
    }

    function check() {
        $sql = $this->insert("price", $_SESSION["db_1"], array("pest" => $_POST["pest"], "area" => $_POST["area"], "type" => $_POST["type"],"price"=>$_POST["price"]));
        if ($this->adminDB[$_SESSION["db_1"]]->query($sql)) {
            $_SESSION['msg'] = $this->printMessage("success", "success");
            return true;
        } else {
            $_SESSION['msg'] = $this->printMessage("failed to save {$sql}", "danger");
            return false;
        }
    }

    public function execute() {
        parent::execute();
        $this->isLoadView("VListofBranches", FALSE, array());
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
