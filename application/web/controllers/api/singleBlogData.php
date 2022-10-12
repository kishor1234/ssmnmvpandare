<?php



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_OpenLink
 *
 * @author asksoft
 */
require_once controller;
class singleBlogData extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        parent::create();
       // $this->isLoadView("header", false, array());
        return;
    }

    public function initialize() {
        parent::initialize();
        //print_r($_REQUEST);
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        
        $title=str_replace("-", " ", $request["title"]);
        $c=array();
        $sql=$this->select("post", $_SESSION["db_1"]).$this->whereSingle(array("title"=>$title));
        $result=$this->executeQuery($sql);
        if($row=$result->fetch_assoc())
        {
           $temp=$row;
           //$temp["description"]=  substr(Strip_tags($row["description"]), 0, 150);
           $temp["urldata"]=strtolower(str_replace(" ", "-", $row["title"]));
           array_push($c,$temp);
           $c["status"]="1";
           $c["message"]="success";
        }else{
            $c=array("status"=>"0","message"=>"No data found");
        }
        echo json_encode($c);
       
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
