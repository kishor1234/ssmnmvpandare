<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_PostData
 *
 * @author asksoft
 */
require_once controller;

class C_PostData extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        //$this->load->view("login.php");
        parent::create();
        if (!isset($_SESSION["login"])) {
            redirect(ASETS . "/?r=" . $this->encript->encdata("login"));
        }
        return;
    }

    public function initialize() {
        parent::initialize();
        try {
            $error=array();
            if (!empty($_FILES)) {
                $blogimage = $this->uploadFile("assets/upload", "file");
                $bannerimage = $this->uploadFile("assets/upload", "banner");
                $filename = $blogimage["filename"];
                $path = $blogimage["path"];
                $blogimage["path"]!=true? array_push($error,"Error on insert Data on Post"):true;
                $filename2 = $bannerimage["filename"];
                $path2 = $bannerimage["path"];
                $bannerimage["path"]!=true? array_push($error,"Error on insert Data on Post"):true;
                $data = array("banner_path" => $path2, "banner_url" => $filename2, "branch" => $this->filterPost("branch"), "title" => $this->filterPost("title"),"btitle" => $this->filterPost("btitle") , "keyword" => $this->filterPost("keyword"), "meta" => $this->filterPost("meta"),"description" => $this->filterPost("txtEditor"), "img" => $filename, "path" => $path, "category" => $this->filterPost("category"), "byw" => $_SESSION["login"], "ip" => $_SERVER["REMOTE_ADDR"]);
                $sql = $this->insert("post", $_SESSION["db_1"], $data);
                $this->adminDB[$_SESSION["db_1"]]->query($sql)!=0? array_push($error,"Error on insert Data on Post"):true;
                $post_id = $this->adminDB[$_SESSION["db_1"]]->insert_id;
                $post_error = $this->adminDB[$_SESSION["db_1"]]->error;
                $this->adminDB[$_SESSION["db_1"]]->query($this->insert("postcvc", $_SESSION["db_1"], array("post_id" => $post_id)))!=0? array_push($error,"Error on insert Data on PostCV"):true;
                $_SESSION["msg"] = $this->printMessage("Success...! #" . $post_error, "success");
            } else {
                $_SESSION["msg"] = $this->printMessage("Faild....@Files", "danger");
            }
        } catch (Exception $ex) {
            $_SESSION["msg"] = $this->printMessage($ex->getMessage(), "danger");
        }
        return;
    }

    function uploadFile($uploadDir, $name) {
        $uploadDir = "assets/upload";
        $tmpFile = $_FILES[$name]['tmp_name'];
        $filename = $uploadDir . '/' . time() . '-' . $_FILES[$name]['name'];
        $path = getcwd() . "/" . $filename;
        move_uploaded_file($tmpFile, $path);
        return array("filename" => $filename, "path" => $path, "status" => true);
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
