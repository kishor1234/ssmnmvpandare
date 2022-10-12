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

class C_AdBook extends CAaskController {

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
                $message = "<center><img src='https://tahaanpestsolutions.com/assets/upload/logo/1566584648-new%20logo.png' alt='Logo' style='height:100px;'></center>";//$this->filterPost("message");
                $message.="<br>";
                $message.="<br>";
                $message.="<br>";
                $message.="<spane><strong>Name : </strong></span>" . $this->filterPost("name");
                $message.="<br><spane><strong>Email : </strong></span>" . $this->filterPost("email");
                $message.="<br><spane><strong>Mobile: </strong></span>" . $this->filterPost("mobile");
                $message.="<br><spane><strong>Client Type : </strong></span>" . $this->filterPost("area");
                $message.="<br><spane><strong>Date : </strong></span>" . $this->filterPost("cdate");
                $result = $this->adminDB[$_SESSION["db_1"]]->query($this->select("post", $_SESSION["db_1"]) . $this->whereSingle(array("id" => $this->filterPost("ourservices"))));
                if ($row = $result->fetch_assoc()) {
                    $message.="<br><spane><strong>Service : </strong></span>" . $row["title"];
                } else {
                    $message.="<br><spane><strong>Service ID : </strong></span>" . $this->filterPost("ourservices");
                }

                $message.="<br><spane><strong>Branch: </strong></span>" . $this->filterPost("branch");
                $message.="<br><spane><strong>Message: </strong></span>" . $this->filterPost("message");
                
                $message1 = "<p>Thanks for Visiting. We will contact you soon....!</p>";
                $message1.="<img src='https://tahaanpestsolutions.com/assets/upload/logo/1566584648-new%20logo.png' alt='Logo' style='height:100px;'>";
                $message1.='<br><p class="adr clearfix col-md-12 col-sm-4">
                        <span class="adr-group pull-left"><strong>       
                                    <span class="street-address">Tahaan Pest Control</span><br>
                                    <span class="region">Plot No 517, Vashi Turbhe Road, </span><br>
                                    <span class="postal-code">Turbhe road, Near Icl School, Navi </span><br>
                                    <span class="country-name">Mumbai</span></strong>
                                </span>
                            </p>';
                            $this->sendMail( $_SESSION["email"], "Contact form website ", $message."<br>".$message1);
                $this->sendMail($this->filterPost("email"), "Thanks for Visiting Tahaan Pest Control Mumbai", $message1);
                echo $this->printMessage("Success...", "success");
            } else {
                echo $this->printMessage("Faild...", "damger");
            }
        } catch (Exception $ex) {
            
        }
        return;
    }

    public function execute() {
        parent::execute();
        try {
            //echo $this->insert("booking", $_SESSION["db_1"], $_POST);
            $_POST["ip"] = $_SERVER["REMOTE_ADDR"];
           
            $this->adminDB[$_SESSION["db_1"]]->query($this->insert("booking", $_SESSION["db_1"], $_POST));
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
