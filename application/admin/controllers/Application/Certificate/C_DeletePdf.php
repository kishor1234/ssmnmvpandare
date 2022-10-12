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

class C_DeletePdf extends CAaskController {

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
            if ($_POST) {
                $resultPdf = $this->adminDB[$_SESSION["db_1"]]->query($this->select("certificate", $_SESSION["db_1"]) . $this->whereSingle($_POST));
                if ($pdf = $resultPdf->fetch_assoc()) {
                    if ($this->adminDB[$_SESSION["db_1"]]->query($this->delete("certificate") . $this->whereSingle($_POST))) {
                        unlink($pdf["path"]);
                        unlink($pdf["imgpath"]);
                        $_SESSION["msg"] = $this->printMessage("Success!...!", "success");
                    } else {
                        $_SESSION["msg"] = $this->printMessage("Invalid Request...!", "danger");
                    }
                } else {
                    $_SESSION["msg"] = $this->printMessage("Invalid Request...!", "danger");
                }
            } else {
                $_SESSION["msg"] = $this->printMessage("Invalid Request...!", "danger");
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
