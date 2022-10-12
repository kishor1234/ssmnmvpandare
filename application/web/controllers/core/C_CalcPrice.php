<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_PrintMessage
 *
 * @author asksoft
 */
require_once controller;

class C_CalcPrice extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        //$this->load->view("login.php");
        parent::create();
        
        try {

            $result = $this->adminDB[$_SESSION["db_1"]]->query($this->select("price", $_SESSION["db_1"]) . $this->where($_POST, "AND"));
            if ($row = $result->fetch_assoc()) {
                echo $row["price"];
            } else {
                echo "0000";
            }

            die;
        } catch (Exception $ex) {
            
        }
        return;
    }

    public function initialize() {
        parent::initialize();

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
