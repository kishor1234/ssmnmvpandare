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
class C_OpenLinkTrue extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        //$this->load->view("login.php");
        parent::create();
       // $this->isLoadView("header", false, array());
        return;
    }

    public function initialize() {
        parent::initialize();
        $choise=$this->encript->decdata($_REQUEST["v"]);
        if(array_key_exists($choise, $this->viewConfig))
        {
            $this->isLoadViewSp("eheader","efooter",$choise, $_REQUEST["eb"], array());
        }  else {
             $this->isLoadView("PageNotFount404", false, array());
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
