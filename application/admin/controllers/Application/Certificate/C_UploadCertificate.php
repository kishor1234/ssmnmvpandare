<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CI_Register
 *
 * @author asksoft
 */
require_once controller;

class C_UploadCertificate extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION["login"])) {
            redirect(ASETS . "/?r=" . $this->encript->encdata("login"));
        }
    }

    public function create() {
        parent::create();

        return;
    }

    public function initialize() {
        parent::initialize();

        return;
    }

    public function execute() {
        parent::execute();
        try {
            if (!empty($_FILES)) {
                //print_r($_FILES);
                $uploadDir = "assets/upload/certificate";
                $tmpFile = $_FILES['file']['tmp_name'];
                $filename = $uploadDir . '/' . time() . '-' . $_FILES['file']['name'];
                $path = getcwd() . "/" . $filename;
                move_uploaded_file($tmpFile, $path);
                //imag
                $tmpFile = $_FILES['imagefile']['tmp_name'];
                $filename2 = $uploadDir . '/' . time() . '-' . $_FILES['imagefile']['name'];
                $path2 = getcwd() . "/" . $filename2;
                move_uploaded_file($tmpFile, $path2);
                
                $sql = $this->insert("certificate", $_SESSION["db_1"], array("pdf" => HOSTURL . $filename, "path" => $path,"img"=>HOSTURL . $filename2,"imgpath"=>$path2, "ip" => $_SERVER["REMOTE_ADDR"]));
                $this->adminDB[$_SESSION["db_1"]]->query($sql);
                echo "<h1>Success</h1>";
                echo "<img src='" . HOSTURL . $filename . "'>";
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
