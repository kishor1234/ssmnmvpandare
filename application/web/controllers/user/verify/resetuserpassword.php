<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of resetuserpassword
 *
 * @author asksoft
 */
//die(APPLICATION);
//require_once getcwd() . '/' . APPLICATION . "/controllers/Crout.php";
require_once controller;

class resetuserpassword extends CAaskController {

//put your code here
    public function __construct() {
        parent::__construct();
    }

    public function create() {
        parent::create();

        return;
    }

    public function initialize() {
        parent::initialize();
        $tamp = explode("~", $this->encript->decdataPass($this->filter($_POST["token"])));
        $this->id = $tamp[0];
        $this->password = password_hash($this->filter($_POST["password"]), PASSWORD_DEFAULT);
        return;
    }

    public function execute() {
        parent::execute();
        $sql = $this->update(array("password" => $this->password), "user") . $this->whereSingle(array("id" => $this->id));
        if ($this->executeQuery($sql)) {
            echo json_encode(array("url" => "/login", "status" => 1, "message" => "Your password successfully rest, login to continue."));
        } else {
            echo json_encode(array("url" => "0", "status" => 0, "message" => "Your password failed to rest, try again.{$this->adminDB[$_SESSION["db_1"]]->error}"));
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
