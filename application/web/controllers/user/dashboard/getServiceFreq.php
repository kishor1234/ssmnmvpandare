<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getAreaList
 *
 * @author atharv
 */
//die(APPLICATION);
//require_once getcwd() . '/' . APPLICATION . "/controllers/Crout.php";
require_once controller;

class getServiceFreq extends CAaskController {

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
        if (empty($_POST)) {
            $postdata = file_get_contents("php://input");
            $_POST = json_decode($postdata, true);
        }
        foreach ($_POST as $key => $val) {
            $this->product[$key] = $this->filter($val);
        }
        //print_r($this->product);
        //$this->product["pest"] = $this->filter($_POST["product"]);
        //$this->product["pest"]="Mosquito Control";
        return;
    }

    public function execute() {
        parent::execute();
        if (!empty($this->product)) {
           $sql = "SELECT DISTINCT type FROM price" . $this->where($this->product,"AND");
        } else {
           $sql = "SELECT DISTINCT type FROM price";
        }
        $result = $this->executeQuery($sql);
        $h = array();

        while ($row = $result->fetch_assoc()) {
            $html = "<option value='{$row["type"]}'>{$row["type"]}</option>";
            array_push($h, $html);
        }


        echo json_encode(array("status" => 1, "html" => $h));
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
