<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_AddComment
 *
 * @author asksoft
 */

require_once controller;
class C_AddComment extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        //$this->load->view("login.php");
        parent::create();
        
        return;
    }

    public function initialize() {
        parent::initialize();
        try{
            
            if(isset($_POST)){
                $data=  array_merge($_POST,array("ip"=>$_SERVER["REMOTE_ADDR"]));
                $sql=$this->insert("comment", $_SESSION["db_1"], $data);
                $this->adminDB[$_SESSION["db_1"]]->query($sql);
                $tid=$this->adminDB[$_SESSION["db_1"]]->insert_id;
                $_SESSION["msg"]=$this->printMessage("Comment Post Success. Your comment is under review", "success");
                $sql=$this->updateINC(array("comment"=>"comment + 1"), "postcvc").$this->whereSingle(array("post_id"=>$this->filterPost("post_id")));
                $this->adminDB[$_SESSION["db_1"]]->query($sql);
                $sql=$this->insert("notification", $_SESSION["db_1"], array("post_id"=>$this->filterPost("post_id"),"tid"=>$tid,"name"=>$this->filterPost("name"),"descr"=>"Comment on Post","ip"=>$_SERVER["REMOTE_ADDR"]));
                
                $this->adminDB[$_SESSION["db_1"]]->query($sql);
                
            }  else {
                $_SESSION["msg"]= $this->printMessage("Faild to post Comment..Try again leater", "danger");
            }
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