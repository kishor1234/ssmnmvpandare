<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author asksoft
 */
//die(APPLICATION);
//require_once getcwd() . '/' . APPLICATION . "/controllers/Crout.php";
require_once controller;

class mail extends CAaskController {

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
        $data = "<table class='email-container' style='margin: auto;' role='presentation' border='0' width='600' cellspacing='0' cellpadding='0' align='center'>";

        foreach ($_POST as $key => $val) {
            $data.="<tr>";
            $data.="<th  style='color: #333333; padding: 0px 10px 0px 20px; font-size:22px; font-weight:bold;'>" . $key . "</th>";
            $data.="<th  style='color: #333333; padding: 0px 10px 0px 20px; font-size:22px; font-weight:bold;'>:</th>";
            $data.="<td  style='color: #555555; padding: 0px 10px 0px 20px; font-size:22px; font-weight:bold;'>" . $val . "</td>";
            $data.="</tr>";
        }
        $data.="</table>";
        $message = ""
                . "<!--Book Appointment-->
<table class='email-container' style='margin: auto;' role='presentation' border='0' width='600' cellspacing='0' cellpadding='0' align='center'>
    <tbody>
        <tr>
            <td style='padding: 10px 0; text-align: center; background: #f7f7f7;'><img style='height: auto; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;' src='https://tahaanpestsolutions.com/assets/upload/logo/1566584648-new%20logo.png' alt='alt_text' border='0' /></td>
        </tr>
    </tbody>
</table>
<!-- Email Header : END -->

<!-- Email Body : BEGIN -->
<table class='email-container' style='margin: auto;' role='presentation' border='0' width='600' cellspacing='0' cellpadding='0' align='center'><!-- Hero Image, Flush : BEGIN --> <!-- Hero Image, Flush : END --> <!-- 1 Column Text + Button : BEGIN -->
    <tbody>
        <tr>
            <td style='padding: 40px 40px 20px; text-align: center;' bgcolor='#ffffff'>
                <h1 style='margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;'>User Contact</h1>

            </td>
        </tr>
        <tr>
            <td style='font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: center;' bgcolor='#ffffff'>
                </td>
        </tr>

        <tr>
            <td>
                <p>&nbsp;</p>
                 {$data}
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td style='padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;' bgcolor='#ffffff'>
                <table role='presentation' border='0' cellspacing='0' cellpadding='0' align='center'>
                    <tbody>
                        <tr>
                            <td class='button-td' style='border-radius: 3px; background: #176da8; text-align: center;'><a class='button-a' style='background: #176da8; border: 15px solid #176da8; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;' href='https://www.tahaanpestsolution.com' target='_blank' rel='noopener'> &nbsp;&nbsp;&nbsp;&nbsp;<span style='color: #ffffff;'>Visit our Website</span>&nbsp;&nbsp;&nbsp;&nbsp; </a></td>
                        </tr>
                    </tbody>
                </table>
                <!-- Button : END --></td>
        </tr>
        <!-- 1 Column Text + Button : END --> <!-- Clear Spacer : BEGIN -->
        
        <tr>
            <td style='font-size: 0; line-height: 0; background: transparent;' height='40' aria-hidden='true'>
                <!--<p style='font-family: sans-serif; font-size: 24px; color: #ffffff; text-align: center;'>* Consultation By Token Only</p>-->
                <!-- Logo -->
                <table style='width: 100%;'>
                    <tbody>
                        <tr>
                            <td style='color: #176da8; padding: 0px 10px 0px 20px; font-size:22px; font-weight:bold;'>Follow Us on:</td>
                            <td style='padding: 0px 0px 8px 228px;'><a style='padding-right: 5px;' href='https://www.facebook.com/TahaanPS' target='_blank' rel='noopener'><img style='background-color: #176da8; border-radius: 5px;' src='https://www.drdivyasharma.com/assets/website/images/fb.png' /></a> 
                                <a style='padding-right: 5px;' href='https://www.instagram.com/tahaan_pest_solutions/' target='_blank' rel='noopener'><img style='background-color: #176da8; border-radius: 5px;' src='https://www.drdivyasharma.com/assets/website/images/insta-icon.png' /></a> 
                                <a style='padding-right: 5px;' href='https://twitter.com/TahaanPS' target='_blank' rel='noopener'><img style='background-color: #176da8; border-radius: 5px;' src='https://www.drdivyasharma.com/assets/website/images/twit.png' /></a>
                                <a style='padding-right: 5px;' href='https://www.linkedin.com/company/tahaan-pest-solutoins' target='_blank' rel='noopener'><img style='background-color: #176da8; border-radius: 5px;' src='https://www.drdivyasharma.com/assets/website/images/link-icon.png' /></a></td>
                        </tr>
                    </tbody>
                </table>
                <!-- End Logo --></td>
        </tr>
        <!-- Clear Spacer : END --></tbody>
</table>"
                . "";

        $this->sendmailWithoutAttachment($this->mailObject, "tahaanpestsolution@gmail.com", "info@tahaanpestsolutions.com", "Tahaan Pest Solutions", $message, "User form Landing page");
        $this->sendmailWithoutAttachment($this->mailObject, "info@tahaanpestsolutions.com", "info@tahaanpestsolutions.com", "Tahaan Pest Solutions", $message, "User form Landing page");
        //send mail to user
        $msg = "<!--Book Appointment-->
<table class='email-container' style='margin: auto;' role='presentation' border='0' width='600' cellspacing='0' cellpadding='0' align='center'>
    <tbody>
        <tr>
            <td style='padding: 10px 0; text-align: center; background: #f7f7f7;'><img style='height: auto; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;' src='https://tahaanpestsolutions.com/assets/upload/logo/1566584648-new%20logo.png' alt='alt_text' border='0' /></td>
        </tr>
    </tbody>
</table>
<!-- Email Header : END -->

<!-- Email Body : BEGIN -->
<table class='email-container' style='margin: auto;' role='presentation' border='0' width='600' cellspacing='0' cellpadding='0' align='center'><!-- Hero Image, Flush : BEGIN --> <!-- Hero Image, Flush : END --> <!-- 1 Column Text + Button : BEGIN -->
    <tbody>
        <tr>
            <td style='padding: 40px 40px 20px; text-align: center;' bgcolor='#ffffff'>
                <h1 style='margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;'>Thank You For contacting With Us</h1>

            </td>
        </tr>
        <tr>
            <td style='font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: center;' bgcolor='#ffffff'>
                <p style='margin: 0;'>Your request has been successfully submitted. One of our representatives shall connect with you shortly. If you would like to speak with someone immediately, connect with us on: <a href='tel:7045671515'>+91 7045671515</a> , <a href='mailto:info@tahaanpestsolutions.com'> info@tahaanpestsolutions.com</a></p>
            </td>
        </tr>

        <tr>
            <td>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td style='padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;' bgcolor='#ffffff'>
                <table role='presentation' border='0' cellspacing='0' cellpadding='0' align='center'>
                    <tbody>
                        <tr>
                            <td class='button-td' style='border-radius: 3px; background: #176da8; text-align: center;'><a class='button-a' style='background: #176da8; border: 15px solid #176da8; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;' href='https://www.tahaanpestsolution.com' target='_blank' rel='noopener'> &nbsp;&nbsp;&nbsp;&nbsp;<span style='color: #ffffff;'>Visit our Website</span>&nbsp;&nbsp;&nbsp;&nbsp; </a></td>
                        </tr>
                    </tbody>
                </table>
                <!-- Button : END --></td>
        </tr>
        <!-- 1 Column Text + Button : END --> <!-- Clear Spacer : BEGIN -->
        <tr>
            <td style='font-size: 0; line-height: 0; background: transparent;' height='40' aria-hidden='true'>
                <!--<p style='font-family: sans-serif; font-size: 24px; color: #ffffff; text-align: center;'>* Consultation By Token Only</p>-->
                <!-- Logo -->
                <table style='width: 100%;'>
                    <tbody>
                        <tr>
                            <td style='color: #176da8; padding: 0px 10px 0px 20px; font-size:22px; font-weight:bold;'>Follow Us on:</td>
                            <td style='padding: 0px 0px 8px 228px;'><a style='padding-right: 5px;' href='https://www.facebook.com/TahaanPS' target='_blank' rel='noopener'><img style='background-color: #176da8; border-radius: 5px;' src='https://www.drdivyasharma.com/assets/website/images/fb.png' /></a> 
                                <a style='padding-right: 5px;' href='https://www.instagram.com/tahaan_pest_solutions/' target='_blank' rel='noopener'><img style='background-color: #176da8; border-radius: 5px;' src='https://www.drdivyasharma.com/assets/website/images/insta-icon.png' /></a> 
                                <a style='padding-right: 5px;' href='https://twitter.com/TahaanPS' target='_blank' rel='noopener'><img style='background-color: #176da8; border-radius: 5px;' src='https://www.drdivyasharma.com/assets/website/images/twit.png' /></a>
                                <a style='padding-right: 5px;' href='https://www.linkedin.com/company/tahaan-pest-solutoins' target='_blank' rel='noopener'><img style='background-color: #176da8; border-radius: 5px;' src='https://www.drdivyasharma.com/assets/website/images/link-icon.png' /></a></td>
                        </tr>
                    </tbody>
                </table>
                <!-- End Logo --></td>
        </tr>
        <!-- Clear Spacer : END --></tbody>
</table>";
        $this->sendmailWithoutAttachment($this->mailObject, $_POST["Email"], "info@tahaanpestsolutions.com", "Tahaan Pest Solutions", $msg, "Tahaan Pest Solution | Thank You For contacting With Us");
       redirect(HOSTURL . "in/thankyou");
        return;
    }

    public function execute() {
        //parent::execute();
        return;
    }

    public function finalize() {
        //parent::finalize();
        return;
    }

    public function reader() {
        //parent::reader();
        return;
    }

    public function distory() {
        //parent::distory();
        return;
    }

    

}
