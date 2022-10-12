<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_OpenLink
 *
 * @author asksoft
 */
require_once controller;

class fetchHomeServices extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        parent::create();
       
        return;
    }

    public function initialize() {
        parent::initialize();
        //$sql="SELECT * FROM `price` INNER JOIN `type` ON `price`.`type`=`type`.`type` WHERE `price`.`pest`='{$_POST["pest"]}' LIMIT {$_POST["limit"]}";
        $sql = "SELECT post.description,price.pest,price.price, price.area,price.type, type.hms FROM `post` INNER JOIN price ON post.title=price.pest INNER JOIN type ON price.type=type.type WHERE price.pest='{$_POST["pest"]}' AND post.category='Booking'  LIMIT {$_POST["limit"]}";
        $result = $this->adminDB[$_SESSION["db_1"]]->query($sql);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        $this->isLoadView("homeServices", false, array("data" => $data));
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
