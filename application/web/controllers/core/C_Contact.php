<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_sendMail
 *
 * @author asksoft
 */
require_once controller;

class C_Contact extends CAaskController {

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
            if (isset($_POST)) {
                $message = $this->filterPost("message");
                $message.="<br>";
                $message.="<br>";
                $message.="<br>";
                $message.="<spane><strong>Name : </strong></span>" . $this->filterPost("name");
                $message.="<spane><strong>Email : </strong></span>" . $this->filterPost("email");
                $message.="<spane><strong>Mobile: </strong></span>" . $this->filterPost("mobile");
                $this->sendMailBoth($this->filterPost("email"), "info@tahaanpestsolutions.com", $this->filterPost("subject"), $message);
                $message1 = "<p>Thanks for Visiting. We will contact you soon....!</p>";
                $message1.="<img src='#' alt='Logo' style='height:100px;'>";
                $message1.='<br><p class="adr clearfix col-md-12 col-sm-4">
                        <span class="adr-group pull-left"><strong>       
                                    <span class="street-address">Tahaan Pest Control</span><br>
                                    <span class="region">Plot No 517, Vashi Turbhe Road, </span><br>
                                    <span class="postal-code">Turbhe road, Near Icl School, Navi </span><br>
                                    <span class="country-name">Mumbai</span></strong>
                                </span>
                            </p>';
                $this->sendMail($this->filterPost("email"), "Thanks for Visiting Tahaan Pest Control Mumbai", $message1);
                $this->printMessage("Success...", "success");
            } else {
                $this->printMessage("Faild...", "damger");
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

}
