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

class verifyhook extends CAaskController {

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
        $postdata = file_get_contents("php://input");
        //$request = json_decode($postdata, true);
        $this->executeQuery($this->insert("rows", $_SESSION["db_1"], array("datas" => $postdata)));
        $this->executeQuery($this->insert("rows", $_SESSION["db_1"], array("datas" => json_encode($_POST))));
        header("HTTP/1.1 200 OK");

        //$this->executeQuery($this->insert("rows", $_SESSION["db_1"], array("datas"=>json_encode($_REQUEST))));

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
