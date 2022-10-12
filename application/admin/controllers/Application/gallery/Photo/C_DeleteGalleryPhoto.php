<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_DeleteGalleryPhoto
 *
 * @author asksoft
 */
require_once controller;
class C_DeleteGalleryPhoto extends CAaskController {

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

        return;
    }

    public function execute() {
        parent::execute();
        try{
            if(isset($_POST)){
                $sql=$this->delete("photo_gallery").$this->whereSingle(array("id"=>$this->filterPost("id")));
                $this->adminDB[$_SESSION["db_1"]]->query($sql);
                unlink($this->filterPost("path"));
                $_SESSION["msg"]=$this->printMessage("Successfully Delete Photo...!","success");
            }else{
                $_SESSION["msg"]=$this->printMessage("Faild to Delete Photo...!","damger");
            }
        } catch (Exception $ex) {

        }
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
