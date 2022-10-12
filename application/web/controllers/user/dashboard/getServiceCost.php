<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getServiceCost
 *
 * @author atharv
 */
//die(APPLICATION);
//require_once getcwd() . '/' . APPLICATION . "/controllers/Crout.php";
require_once controller;

class getServiceCost extends CAaskController {

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
        $this->product["area"] = $this->filter($_POST["area"]);
        $this->product["type"] = $this->filter($_POST["type"]);
        return;
    }

    public function execute() {
        parent::execute();
        $sql = $this->select("price", $_SESSION["db_1"]) . $this->where($this->product, "AND");
        $result = $this->executeQuery($sql);
        if ($row = $result->fetch_assoc()) {
            (float)$int = (float) $row["price"] * ((float) $_SESSION["discount"] / 100);
            (float)$damount = (float) $row["price"] - (float)$int;
            $row["discount"] = (float)$_SESSION["discount"];
            $row["disamount"] = (float)$damount;
            $data = array("status" => 1, "message" => "Success", "data" => $row);
        } else {
            $data = array("status" => 0, "message" => "Data not fount");
        }
        echo json_encode($data);
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
