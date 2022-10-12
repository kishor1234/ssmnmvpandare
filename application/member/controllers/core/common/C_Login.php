<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_Login
 *
 * @author asksoft
 */

require_once controller;
class C_Login extends CAaskController {

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
        $_SESSION["email"]="kishor4shinde@gmail.com";
        redirect(HOSTURL."?r=".$this->encript->encdata("C_OpenLink")."&v=".$this->encript->encdata("VDashBoard")."&t=01");
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
