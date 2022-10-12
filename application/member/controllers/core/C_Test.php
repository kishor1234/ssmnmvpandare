<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
class C_Test extends CAaskController {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function create() {
        parent::create();
        //if(!isset($_SESSION["email"])){redirect(ASETS);}
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
        
        if((int)$_REQUEST["t"]==0)
        {
            $this->isLoadView("Test", false, array());
        }
        else{
           $this->isLoadView("Test", true, array());
        }
        
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
