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
class blogs extends CAaskController {

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
        //print_r($_REQUEST);
        $c=str_replace("-"," ",$_REQUEST["c"]);
        $sql=$this->select("post", $_SESSION["db_1"]).$this->where(array("category"=>"Blog","title"=>$c),"AND");
        $result=$this->executeQuery($sql);
        if($row=$result->fetch_assoc())
        {
           $_SESSION["mData"]["postid"]=$row["id"]; 
           $this->isLoadView("VSingle", true, array());
        }else{
            $this->isLoadView("error_404", true, array());
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
