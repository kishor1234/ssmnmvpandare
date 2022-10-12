<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sendTodaysSchedule
 *
 * @author atharv
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once controller;

class sendTodaysSchedule extends CAaskController {

    //put your code here
    public $data = array();

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        parent::create();
//        header('Content-Type: text/csv; charset=utf-8');
//        header('Content-Disposition: attachment; filename=data.csv');
        return;
    }

    public function initialize() {
        parent::initialize();

        return;
    }

    public function execute() {
        parent::execute();

        //$this->create_csv_string();
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

    function create_csv_string() {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename= ' . md5(time()) . 'Schedule.csv');

        $date = date("Y-m-d");
        $sql = "SELECT `user`.`email`,`user`.`mobile`,`orders`.`order_id`,`orders`.`fname`,`orders`.`lname`,`orders`.`shipping_address`,`orders`.`shipping_address2`,`orders`.`shipping_country`,`orders`.`shipping_state`,`orders`.`shipping_city`,`orders`.`shipping_zip`, `orderproduct`.`product`,`orderproduct`.`area`,`orderproduct`.`type`,`orderproduct`.`price`,`orderproduct`.`disamount`,`schedule`.`schedule`,`schedule`.`modify_reson`,`schedule`.`status` FROM `user` INNER JOIN `orders` ON `user`.`id`=`orders`.`uid` INNER JOIN `orderproduct` ON `orders`.`order_id`=`orderproduct`.`order_id` INNER JOIN `schedule` ON `orderproduct`.`order_id`=`schedule`.`order_id` WHERE DATE(`schedule`.`schedule`) BETWEEN '{$date} 00:00:00' AND '{$date} 11:59:59' AND `orders`.`status`='Success' AND `schedule`.`status`='schedule'";
        $result = $this->executeQuery($sql);

        // Open temp file pointer
        if (!$fp = fopen('php://output', 'w')) {
            return FALSE;
        }


        fputcsv($fp, array('ID', 'First Name', 'Last Name', 'Address', 'Email', 'Phone Number', 'Product', "Area", "Type", "Price", "Schedule", "Modify_Reson", "Order_Status"));

        // Loop data and write to file pointer
        $line = array();
        while ($row = $result->fetch_assoc()) {
            $line["ID"] = $row["order_id"];
            $line["First Name"] = $row["fname"];
            $line["Last Name"] = $row["lname"];
            $line["Address"] = $row["shipping_address"] . " " . $row["shipping_address2"] . " " . $row["shipping_state"] . " " . $row["shipping_city"] . " " . $row["shipping_country"] . " " . $row["shipping_zip"];
            $line["Email"] = $row["email"];
            $line["Phone Number"] = $row["mobile"];
            $line["Product"] = $row["product"];
            $line["Area"] = $row["area"];
            $line["Type"] = $row["type"];
            $line["Price"] = $row["disamount"];
            $line["Schedule"] = $row["schedule"];
            $line["Modify_Reson"] = $row["modify_reson"];
            $line["Order_Status"] = $row["status"];
            //print_r($line);
            fputcsv($fp, $line);
            $line = array();
        }

        // Place stream pointer at beginning
        //rewind($fp);
        // Return the data
        return stream_get_contents($fp);
    }

    function send_csv_mail() {

        // This will provide plenty adequate entropy
        $multipartSep = '-----' . md5(time()) . '-----';



        // Make the attachment
        $attachment = chunk_split(base64_encode($this->create_csv_string()));

        $email = "kishor4shinde@gmail.com";

        $date = date("Y-m-d");
        $filename = "{$multipartSep}_{$date}_Schedule.csv";
        $file = array(
            "path" => $attachment,
            "name" => $filename,
            "encoding" => "base64",
            "type" => "text/csv"
        );

        // $this->sendmailWithAttachment($email, "info@tahaanpestsolutions.com", "Tahaan Pest", "Scheduwl email", "Today Schedule", $file);
        //return @mail($to, $subject, $body, implode("\r\n", $headers));
    }

}
