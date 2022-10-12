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

class resetpassword extends CAaskController {

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
        $temp = explode("~", $this->encript->decdataPass($_REQUEST["v"]));

        $this->id = $temp["0"];
        $this->time = $temp["1"];
        $ctime = strtotime(date("Y-m-d h:i:sa"));
        //$endTime = strtotime("+2 minutes", strtotime($selectedTime));
        if ($ctime > $this->time)
            echo "This reset link is expired. Try another link.";
        else
            $this->isLoadView("resetpasswordform", false, array("token" => $_REQUEST["v"]));
        return;
    }

    public function execute() {
        //parent::execute();
        return;
    }

    public function finalize() {
        //parent::finalize();
        return;
    }

    public function reader() {
        //parent::reader();
        return;
    }

    public function distory() {
        //parent::distory();
        return;
    }

}
