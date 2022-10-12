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

class C_SaveForm extends CAaskController {

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
        try {
            if (isset($_FILES)) {
                $dest = "asets/upload/resume/";
                $filename = time() . "-" . $_FILES["file"]["name"];
                $url = HOSTURL . $dest . $filename;
                $path = getcwd() . "/" . $dest . $filename;
                $temp = $_FILES["file"]["tmp_name"];
                move_uploaded_file($temp, $path);
                $sql="INSERT INTO `forms`(`opeining`,`name`, `email`, `mobile`, `msg`, `ip`, `type`,`url`,`path`) VALUES ('".$_POST["inputOpening"]."','".$_POST["inputName"]."','".$_POST["inputEmail"]."','".$_POST["inputMobile"]."','".$_POST["inputMsg"]."','".$_SERVER["REMOTE_ADDR"]."','".$_POST["type"]."','".$url."','".$path."')";
                if($this->adminDB[$_SESSION["db_1"]]->query($sql))
                {
                     $_SESSION["msg"]=$this->printMessage("Success  to send your resume...!", "success");
                }else{
                     $_SESSION["msg"]=$this->printMessage("Faild Insert to send your resume...!", "danger");
                }
                
            }
            else{
                $_SESSION["msg"]=$this->printMessage("Faild to send your resume...!", "danger");
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
