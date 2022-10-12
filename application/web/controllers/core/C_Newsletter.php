<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_Newsletter
 *
 * @author asksoft
 */

require_once controller;
class C_Newsletter extends CAaskController {

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
                $data=array("email"=>$this->filterPost("email"),"ip"=>$_SERVER["REMOTE_ADDR"]);
                
                $this->adminDB[$_SESSION["db_1"]]->query($this->insert("newsletter", $_SESSION["db_1"], $data));
                echo $this->printMessage("Success ...!", "success");
                $this->sendMail($this->filterPost("email"), "Thanks for subscribing ", "<p> Thanks ofr subscribing </p>");
                $_SESSION["sn"]="set";
                }else{
                echo $this->printMessage("Faild...!", "danger");
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