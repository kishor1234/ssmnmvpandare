<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once controller;
class C_UpdateBranch extends CAaskController {
    //put your code here
    public function __construct() {
        parent::__construct();
        if(!isset($_SESSION["login"])){redirect(HOSTURL);}
    }
    public function create() {
        parent::create();
        return;
    }
    public function initialize() {
        parent::initialize();
        try{
            if($this->isValidate())
            {
               if($this->adminDB[$_SESSION["db_1"]]->query($this->update(array("blocation"=>$this->filterPost("blocation"),"address"=>$this->filterPost("address"),"contact"=>$this->filterPost("contact")), "hf_branch").$this->whereSingle(array("id"=>$this->filterPost("id"))))){
                   $_SESSION["msg"]=$this->printMessage("Success......!", "success");
                   //$this->isLoadView("VAddNewBranch", true, array());
                   redirect(HOSTURL."/?r=".$this->encript->encdata("C_OpenLinkTrue")."&v=".$this->encript->encdata("VBranch"));
               } else{
                   $_SESSION["msg"]=$this->printMessage("Error on data insert......!", "warning");
               }
            }else{
                $_SESSION["msg"]=$this->printMessage("Validation Error", "danger");
            }
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
    function isValidate()
    {
        return true;
    }
  
}
