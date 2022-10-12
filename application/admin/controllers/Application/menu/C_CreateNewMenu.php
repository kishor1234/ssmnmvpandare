<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CI_Register
 *
 * @author asksoft
 */
require_once controller;

class C_CreateNewMenu extends CAaskController {

//put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION["login"])) {
            redirect(ASETS . "/?r=" . $this->encript->encdata("login"));
        }
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
        try {

            if (isset($_POST)) {
                switch ($this->filterPost("action")) {
                    case "saveData":
                        $this->saveData();
                        break;
                    case "loadTable":
                        $this->loadTable();
                        break;
                    case "publish":
                        $this->publish();
                        break;
                    case "unpublish":
                        $this->unpublish();
                        break;
                    case "deleteMenu":
                        $this->deleteMenu();
                        break;
                    case "viewData";
                        $this->viewData();
                        break;
                    case "updateData";
                        $this->updateData();
                        die;
                        break;
                    default :
                        $this->viewData();
                        break;
                }
            }
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

///new code

    function deleteData() {
        if ($this->adminDB[$_SESSION["db_1"]]->query($this->delete("menu") . $this->whereSingle(array("id" => $_POST["id"])))) {
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
        $sql = $this->insert("menu", $_SESSION["db_1"], $_POST);

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
        $sql = $this->update($_POST, "menu") . $this->whereSingle(array("id" => $id));
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

    function loadTable() {
        $this->isLoadView("VMenuTable", false, array("pg" => $this->filterPost("pg")));
    }

    function publish() {
        $sql = $this->adminDB[$_SESSION["db_1"]]->query($this->update(array("active" => 1), "menu") . $this->whereSingle(array("id" => $this->filterPost("id"))));
        if ($sql) {
            echo json_encode(array("status" => 1, "msg" => "Your post successfully publish", "method" => "Publish..!", "dis" => "success"));
        } else {
            echo json_encode(array("status" => 0, "msg" => "Error on Publish post", "method" => "Publish..!", "dis" => "warning"));
        }
        return false;
    }

    function unpublish() {
        $sql = $this->adminDB[$_SESSION["db_1"]]->query($this->update(array("active" => 0), "menu") . $this->whereSingle(array("id" => $this->filterPost("id"))));
        if ($sql) {
            echo json_encode(array("status" => 1, "msg" => "Your post successfully un publish", "method" => "Publish..!", "dis" => "success"));
        } else {
            echo json_encode(array("status" => 0, "msg" => "Error on un-Publish post", "method" => "Publish..!", "dis" => "warning"));
        }
        return false;
    }

    function deleteMenu() {
        $sql = $this->adminDB[$_SESSION["db_1"]]->query($this->delete("menu") . $this->whereSingle(array("id" => $this->filterPost("id"))));
        if ($sql) {
            echo json_encode(array("status" => 1, "msg" => "Your post successfully Deleted", "method" => "Publish..!", "dis" => "success"));
        } else {
            echo json_encode(array("status" => 0, "msg" => "Error on Deleteing post", "method" => "Publish..!", "dis" => "warning"));
        }
        return false;
    }

    function viewData() {
        $s = $this->select("menu", $_SESSION["db_1"]) . $this->whereSingle(array("id" => $this->filterPost("id")));
        $sql = $this->adminDB[$_SESSION["db_1"]]->query($s);
        if ($row = $sql->fetch_assoc()) {
            echo json_encode(array("status" => 1, "msg" => "Success", "method" => "Publish..!", "dis" => "success", "data" => $row));
        } else {
            echo json_encode(array("status" => 0, "msg" => "Failed to load", "method" => "Publish..!", "dis" => "warning", "data" => null));
        }
    }

}
