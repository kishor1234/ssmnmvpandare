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

class getAreaList extends CAaskController {

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
        $this->product["pest"] = $this->filter($_POST["product"]);
        //$this->product["pest"]="Mosquito Control";
        return;
    }

    public function execute() {
        parent::execute();
        $sql = "SELECT DISTINCT area FROM price" . $this->whereSingle($this->product);
        $result = $this->executeQuery($sql);
        $h = array();

        while ($row = $result->fetch_assoc()) {
            $html = "<option value='{$row["area"]}'>{$row["area"]}</option>";
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
