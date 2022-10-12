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

class C_SingleVideo extends CAaskController {

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
            if (filter_var($this->filterPost("inputUrl"), FILTER_VALIDATE_URL)) {
                $url = $this->filterPost("inputUrl");
                $s = explode("=", $url);
                //https://www.googleapis.com/youtube/v3/videos?id=qIDPO7_DDpc&key=AIzaSyB-YqGADAXd9m8ZZWu2jH6KJKqBUJuiHfQ&part=snippet,contentDetails,statistics,status
                $image = "https://img.youtube.com/vi/" . $s[1] . "/default.jpg";
                $data = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=" . $s[1] . "&key=AIzaSyAZMq7Cq9VCnXpPtATlksgoN61JXqVwSus&part=snippet,contentDetails,statistics,status");
                $result = json_decode($data, true);
                //echo $result["items"][0]["snippet"]["title"];die;
                $title = ($result["items"][0]["snippet"]["title"]);
                $url="http://www.youtube.com/embed/".$s[1]."?autoplay=1";
                $data = array("youtube_url"=>$url,"youtube_id" => $s[1], "image_url" => $image, "video_title" => $title);
                //$sql = $this->update($data, "home_video") . $this->whereSingle(array("id" => 1));
                $sql=$this->insert("home_video", $_SESSION["db_1"], $data);
                if ($this->adminDB[$_SESSION["db_1"]]->query($sql)) {
                    $_SESSION["msg"] = $this->printMessage("Video Uploaded Success.....!", "success");
                } else {
                    $_SESSION["msg"] = $this->printMessage("YouTube Video Uploaded Failed...!", "danger");
                }
            }else{
                $_SESSION["msg"] = $this->printMessage("Invalid YouTube Video Link...!", "danger");
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
