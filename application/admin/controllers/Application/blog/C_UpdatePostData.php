<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_UpdatePostData
 *
 * @author asksoft
 */
require_once controller;

class C_UpdatePostData extends CAaskController {

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
           
            if (isset($_POST)) {
                $data = array();
                $blog = array();
                $banner = array();
                if (!empty($_FILES["file"]["name"])) {
                    $blogimage = $this->uploadFile("assets/upload", "file");
                    $blog = array("img" => $blogimage["filename"], "path" => $blogimage["path"]);
                    unlink($this->filterPost("path"));
                }
                if (!empty($_FILES["banner"]["name"])) {
                    $bannerimage = $this->uploadFile("assets/upload", "banner");
                    //$blogimage["path"] != true ? array_push($error, "Error on insert Data on Post") : true;
                    $banner = array("banner_url" => $bannerimage["filename"], "banner_path" => $bannerimage["path"]);
                    unlink($this->filterPost("bannerpath"));
                }


                $data = array("branch" => $this->filterPost("branch"),"title" => $this->filterPost("title"), "meta" => $this->filterPost("meta"),"description" => $this->filterPost("txtEditor"), "category" => $this->filterPost("category"),"btitle" => $this->filterPost("btitle") , "keyword" => $this->filterPost("keyword"),"byw" => $_SESSION["login"], "ip" => $_SERVER["REMOTE_ADDR"]);
            } else {
                $data = array("branch" => $this->filterPost("branch"),"meta" => $this->filterPost("meta"), "title" => $this->filterPost("title"), "description" => $this->filterPost("txtEditor"), "category" => $this->filterPost("category"),"btitle" => $this->filterPost("btitle") , "keyword" => $this->filterPost("keyword"), "byw" => $_SESSION["login"], "ip" => $_SERVER["REMOTE_ADDR"]);
            }
            $data3 = array_merge($data, $blog);
            $data = array_merge($data3, $banner);
            $sql = $this->update($data, "post") . $this->whereSingle(array("id" => $this->filterPost("post_id")));
            //echo $sql;die;
            if ($this->adminDB[$_SESSION["db_1"]]->query($sql)) {
                $_SESSION["msg"] = $this->printMessage("Success...!", "success");
            } else {
                $_SESSION["msg"] = $this->printMessage("Faild...!", "danger");
            }
        } catch (Exception $ex) {
            $_SESSION["msg"] = $this->printMessage($ex->getMessage(), "danger");
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

    private function uploadFile($uploadDir, $name) {
        $uploadDir = "assets/upload";
        $tmpFile = $_FILES[$name]['tmp_name'];
        $filename = $uploadDir . '/' . time() . '-' . $_FILES[$name]['name'];
        $path = getcwd() . "/" . $filename;
        move_uploaded_file($tmpFile, $path);
        return array("filename" => $filename, "path" => $path, "status" => true);
    }

}
