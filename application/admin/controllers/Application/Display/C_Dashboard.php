<?php

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

class C_Dashboard extends CAaskController
{

    //put your code here
    public $visState = false;

    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        //$this->load->view("login.php");
        parent::create();

        return;
    }

    public function initialize()
    {
        parent::initialize();

        return;
    }

    public function execute()
    {
        parent::execute();
        try {

            if (isset($_POST)) {
                $sql = $this->select("collegeinfo", $_SESSION["db_1"]) . $this->where(array("username" => $this->filterPost("username"), "password" => md5($this->filterPost("password"))), "and");
                $result = $this->adminDB[$_SESSION["db_1"]]->query($sql);
                $row = $result->fetch_assoc();
                $this->check($row);
            } else {
                $_SESSION["msg"] = "Invalid Input..!";
                redirect(HOSTURL);
            }
        } catch (Exception $ex) {
        }
        return;
    }

    public function finalize()
    {
        parent::finalize();
        return;
    }

    public function reader()
    {
        parent::reader();
        return;
    }

    public function distory()
    {
        parent::distory();
        return;
    }

    function check($row)
    {
        if (!empty($row)) {
            if (strcmp(md5($this->filterPost("password")), $row["password"]) == 0) {
                $_SESSION["login"] = $row["email"];
                $this->session_set($row);
                redirect(HOSTURL . "?r=" . $this->encript->encdata("C_OpenLink") . "&v=" . $this->encript->encdata("Dashboard"));
            } else {
                $_SESSION["msg"] = "Invalid Username and password..!";
                redirect(HOSTURL);
            }
        } else {
            $_SESSION["msg"] = "Invalid Username and password..!";
            redirect(HOSTURL);
        }
    }
}
