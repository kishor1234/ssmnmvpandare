<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_Newsletter
 *
 * @author asksoft
 */
require_once controller;

class C_GetBranch extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        //$this->load->view("login.php");  $row["blocation"]
        parent::create();

        return;
    }

    public function initialize() {
        parent::initialize();
        try {
            $sql = "SELECT * FROM hf_branch WHERE id=(SELECT branch FROM post WHERE id='" . $this->filterPost("id") . "')";
            $resutl = $this->adminDB[$_SESSION["db_1"]]->query($sql);
            $data = array();
            if ($row = $resutl->fetch_assoc()) {
                $data = array("status" => 1,
                    "val" => "Mumbai",
                    "msg" => "Success...");
            } else {
                $data = array("status" => 0,
                    "val" => "Null",
                    "msg" => "Faild to get Branch...");
            }
            $data = array("status" => 1,
                    "val" => "Mumbai",
                    "msg" => "Success...");
            echo json_encode($data);
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

}
