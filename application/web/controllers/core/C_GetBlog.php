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

class C_GetBlog extends CAaskController {

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
            header('Access-Control-Allow-Origin: *');
            $sql = $this->select("post", $_SESSION["db_1"]) . $this->whereSingle(array("id" => $_REQUEST["id"]));
            $result = $this->adminDB[$_SESSION["db_1"]]->query($sql);
            if ($row = $result->fetch_assoc()) {
                $data = array(
                    "title" => $row["title"],
                    "img" => HOSTURL . $row["img"],
                    "url" => HOSTURL . "?utm_source=infographic&utm_medium=web-blog&utm_campaign=infographic&utm_term=1&utm_content={$row["title"]}"
                );
                echo json_encode($data);
            } else {
                $data = array(
                    "title" => "Blog not found",
                    "img" => HOSTURL . "assets/upload/logo/1563359754-new%20logo.png",
                    "url" => HOSTURL . "?utm_source=infographic&utm_medium=web-blog&utm_campaign=infographic&utm_term=1&utm_content={$row["title"]}"
                );
                echo json_encode($data);
            }
//echo json_encode($data);
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
