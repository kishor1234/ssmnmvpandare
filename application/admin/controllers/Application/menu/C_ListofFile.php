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

class C_ListofFile extends CAaskController {

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
            $data = array();
            $result = $this->adminDB[$_SESSION["db_1"]]->query($this->select("project", $_SESSION["db_1"]) . $this->whereSingle(array("domain" => $_POST["domain"])));
            if ($row = $result->fetch_assoc()) {
                $data = $this->listFolderFilesPhp(ltrim($row[$_POST["cont"]]));
                foreach ($data as $key => $val) {
                    echo "<option value='{$key}'>{$key}</option>";
                }
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
