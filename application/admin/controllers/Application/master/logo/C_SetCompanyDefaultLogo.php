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

class C_SetCompanyDefaultLogo extends CAaskController {

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
        if (!isset($_SESSION["login"])) {
            redirect(ASETS . "/?r=" . $this->encript->encdata("login"));
        }
        return;
    }

    public function initialize() {
        parent::initialize();

        return;
    }

    public function execute() {
        parent::execute();
        try {
            $sql = $this->update(array("state" => 0), "logo");
            $this->adminDB[$_SESSION["db_1"]]->query($sql);
            $sql = $this->update(array("logo" => $_REQUEST["logo"]), "collegeinfo") . $this->whereSingle(array("id" => $this->filterPost("id")));
            if ($this->adminDB[$_SESSION["db_1"]]->query($sql)) {
                $sql = $this->update(array("state" => 1), "logo").$this->whereSingle(array("id" => $_REQUEST["l"]));
                $this->adminDB[$_SESSION["db_1"]]->query($sql);
                $_SESSION["msg"] = $this->printMessage("Default logo set successfully...", "success");
            } else {
                $_SESSION["msg"] = $this->printMessage("Unable to set company logo", "danger");
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
