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

class C_SendNeweletterMail extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
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
            $result=$this->adminDB[$_SESSION["db_1"]]->query($this->select("newsletter", $_SESSION['db_1']));
            while($row=$result->fetch_assoc())
            {
                $this->sendmailWithoutAttachment($row["email"], "no-replay@studyansee.in", "Tahaan Pest Control", $this->filterPost("Msg"), $this->filterPost("subject"));
                //$this->sendMail($row["email"], $this->filterPost("subject"), $this->filterPost("Msg"));
            }
            $_SESSION["msg"]=$this->printMessage("Success...", "success");
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
