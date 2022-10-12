<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_DeleteEventPhoto
 *
 * @author asksoft
 */

require_once controller;
class C_DeleteEventPhoto extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        //$this->load->view("login.php");
        parent::create();
         if(!isset($_SESSION["login"])){redirect(ASETS."/?r=".$this->encript->encdata("login"));}
        return;
    }

    public function initialize() {
        parent::initialize();
        try
        {
            $sql=$this->select("events", $_SESSION["db_1"]).$this->whereSingle(array("id"=>$this->filterPost("id")));
            $result=$this->adminDB[$_SESSION["db_1"]]->query($sql);
            $row=$result->fetch_assoc();
            $sql=$this->delete("events").$this->whereSingle(array("id"=>$this->filterPost("id")));
            $this->adminDB[$_SESSION["db_1"]]->query($sql);
            $this->isLoadView("VEventPhotoTable", false, array("title"=>$row["title"]));
            unlink($row["path"]);
           $_SESSION["msg"]="Success..!";
        } catch (Exception $ex) {

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
