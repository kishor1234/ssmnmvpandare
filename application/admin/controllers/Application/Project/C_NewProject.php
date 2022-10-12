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

class C_NewProject extends CAaskController {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function create() {
        parent::create();
        if (!isset($_SESSION["id"])) {
            redirect(HOSTURL . "?r=" . $this->encript->encdata("main"));
        }
        return;
    }

    public function initialize() {
        parent::initialize();
        try {
            if (isset($_POST)) {
                switch ($_POST["action"]) {
                    case "saveData":
                        $this->saveData();
                        break;
                    case "updateData":
                        $this->updateData();
                        break;
                    case "deleteData":
                        $this->deleteData();
                        break;
                    default :
                        $this->getData();
                        break;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            error_log($ex, 3, "error.log");
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

    function deleteData() {
        if ($this->adminDB[$_SESSION["db_1"]]->query($this->delete("project") . $this->whereSingle(array("id" => $_POST["id"])))) {
            $data = array(
                "status" => 1,
                "msg" => "Success"
            );
            echo json_encode($data);
        } else {
            $data = array(
                "status" => 0,
                "msg" => "Failed"
            );
            echo json_encode($data);
        }
    }

    function saveData() {

        //usset($_POST["id"]);
        unset($_POST["id"]);
        $sql = $this->insert("project", $_SESSION["db_1"], $_POST);

        if ($this->adminDB[$_SESSION["db_1"]]->query($sql)) {
            $data = array(
                "status" => 1,
                "msg" => "Success"
            );
            echo json_encode($data);
        } else {
            $data = array(
                "status" => 0,
                "msg" => "Eroor " . $sql
            );
            echo json_encode($data);
        }
    }

    function updateData() {
        $id = $_POST["id"];
        unset($_POST["id"]);
        $sql = $this->update($_POST, "project") . $this->whereSingle(array("id" => $id));
        if ($this->adminDB[$_SESSION["db_1"]]->query($sql)) {
            $data = array(
                "status" => 1,
                "msg" => "Success"
            );
            echo json_encode($data);
        } else {
            $data = array(
                "status" => 0,
                "msg" => "Eroor " . $sql
            );
            echo json_encode($data);
        }
    }

    function getData() {
        $sql = $this->select("project", $_SESSION["db_1"]) . $this->whereSingle(array("id" => $_POST["id"]));
        if ($result = $this->adminDB[$_SESSION["db_1"]]->query($sql)) {
            $row = $result->fetch_assoc();
            $data = array(
                "status" => 1,
                "msg" => "Success",
                "data" => $row
            );
            echo json_encode($data);
        } else {
            $data = array(
                "status" => 0,
                "msg" => "Eroor " . $sql,
                "data" => null
            );
            echo json_encode($data);
        }
    }

}
