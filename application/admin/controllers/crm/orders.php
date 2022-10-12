<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orders
 *
 * @author asksoft
 */
//die(APPLICATION);
//require_once getcwd() . '/' . APPLICATION . "/controllers/Crout.php";
require_once controller;

class orders extends CAaskController {

    //put your code here
    public $data = array();

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        parent::create();
        if (!isset($_SESSION["id"])) {
            // redirect(HOSTURL . "?r=" . $this->encript->encdata("main"));
        }
        return;
    }

    public function initialize() {
        parent::initialize();
        if (empty($_POST)) {
            $postdata = file_get_contents("php://input");
            $_POST = json_decode($postdata, true);
        }
        foreach ($_POST as $key => $val) {
            $this->postData[$key] = $this->filter($val);
        }

        return;
    }

    public function execute() {
        parent::execute();
        switch ($_POST["action"]) {
            case "loadTable";
                $this->loadTable();
                break;
            case "changeSchedule":
                $this->changeSchedule();
                break;
            case "setService":
                $this->setService();
                break;
            case "uploadInvoice":
                $this->uploadInvoice();
                break;
            case "updateStatus":
                $this->updateStatus();
                break;
            case "loadTableDatewise":
                $this->loadTableDatewise();
                break;
            case "SearchloadTableDatewise":
                $this->SearchloadTableDatewise();
                break;
            case "CustomeloadTableDatewise":
                $this->CustomeloadTableDatewise();
                break;
            default :

                //$this->loadTable();
                $postdata = file_get_contents("php://input");
                $request = json_decode($postdata, true);
                print_r($request);
                //$this->SearchloadTableDatewise();
                //echo json_encode(array("toast" => array("danger", "Series", "Invalid Sereis selected "), "status" => 0, "message" => "Invalid Series selected"));
                break;
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

    function updateStatus() {
        $data = $this->postData;
        unset($data["action"]);
        unset($data["id"]);
        $sql = $this->update($data, "orders") . $this->whereSingle(array("id" => $this->postData["id"]));
        if ($this->executeQuery($sql)) {
            echo json_encode(array("status" => 1, "message" => "Success ", "id" => $this->postData["id"], "schedule" => $data["schedule"]));
        } else {
            echo json_encode(array("status" => 0, "message" => $this->adminDB[$_SESSION["db_1"]]->error));
        }
    }

//    public function MessageData($data, $action): string {
//        parent::MessageData($data, $action);
//    }

    function uploadInvoice() {
        $file = $this->uploadFiletoFileSystem("invoice", "/assets/upload");

        $sql = $this->update(array("invoice" => $file["url"]), "orders") . $this->whereSingle(array("order_id" => $this->postData["order_id"]));
        if ($this->executeQuery($sql)) {
            echo json_encode(array("status" => 1, "message" => "Success ", "id" => $this->postData["id"], "schedule" => $data["schedule"]));
        } else {
            echo json_encode(array("status" => 0, "message" => $this->adminDB[$_SESSION["db_1"]]->error));
        }
    }

    function changeSchedule() {
        $data = $this->postData;
        unset($data["action"]);
        unset($data["id"]);
        $sql = $this->update($data, "schedule") . $this->whereSingle(array("id" => $this->postData["id"]));
        if ($this->executeQuery($sql)) {
            echo json_encode(array("status" => 1, "message" => "Success " . $sql, "id" => $this->postData["id"], "schedule" => $data["schedule"]));
        } else {
            echo json_encode(array("status" => 0, "message" => $this->adminDB[$_SESSION["db_1"]]->error));
        }
    }

    function CustomeloadTableDatewise() {
        try {
            $request = $_REQUEST;

            $col = array(
                0 => 'id',
                1 => 'order_id',
                2 => 'fname',
                3 => 'joining',
                4 => 'email',
                5 => 'contact',
                6 => 'status',
                7 => 'onCreate'
            );
            //$sql = "SELECT * FROM `orders` INNER JOIN user ON orders.uid=user.id";
            $sql = "SELECT `user`.`email`,`user`.`mobile`,`orders`.`order_id`,`orders`.`fname`,`orders`.`lname`,`orders`.`shipping_address`,`orders`.`shipping_address2`,`orders`.`shipping_country`,`orders`.`shipping_state`,`orders`.`shipping_city`,`orders`.`shipping_zip`, `orderproduct`.`product`,`orderproduct`.`area`,`orderproduct`.`type`,`orderproduct`.`price`,`orderproduct`.`disamount`,`schedule`.`schedule`,`schedule`.`modify_reson`,`schedule`.`status` FROM `user` INNER JOIN `orders` ON `user`.`id`=`orders`.`uid` INNER JOIN `orderproduct` ON `orders`.`order_id`=`orderproduct`.`order_id` INNER JOIN `schedule` ON `orderproduct`.`order_id`=`schedule`.`order_id` WHERE DATE(`schedule`.`schedule`) BETWEEN '{$_POST["starts"]} 00:00:00' AND '{$_POST["end"]} 11:59:59' AND `orders`.`status`='{$_POST["status"]}' AND `schedule`.`status`='schedule'";

            $query = $this->executeQuery($sql);
            $totalData = $query->num_rows;
            $totalFilter = $totalData;

            // echo $sql;
            //$sql .= $this->whereSingle(array("1" => "1"));
            /* Search */
            if (!empty($request['search']['value'])) {
                $sql .= " AND (orders.fname Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.lname Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.order_id Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  user.email Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.status Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  user.mobile Like '%" . $request['search']['value'] . "%')";
                //$sql .= $this->orderBy($request['order'][0]['dir'], $col[$request['order'][0]['column']]) . $this->ask_mysqli->limitWithOffset($request['start'], $request['length']);
            }
            //echo $sql;
            /* Order */
//            if (!empty($request['order'][0]['dir'])) {
//               // $sql .= $this->orderBy($request['order'][0]['dir'], $col[$request['order'][0]['column']]);
//            }
            $sql .= $this->limitWithOffset($request['start'], $request['length']);
            $query = $this->executeQuery($sql);
            $totalData = $query->num_rows;
            while ($row = $query->fetch_assoc()) {
                $subdata = array();
                $subdata[] = $row["order_id"];
                $subdata[] = $row["fname"];
                $subdata[] = $row["lname"];
                $subdata[] = $row["shipping_address"] . " " . $row["shipping_address2"] . " " . $row["shipping_state"] . " " . $row["shipping_city"] . " " . $row["shipping_country"] . " " . $row["shipping_zip"];
                $subdata[] = $row["email"];
                $subdata[] = $row["mobile"];
                $subdata[] = $row["product"];
                $subdata[] = $row["area"];
                $subdata[] = $row["type"];
                $subdata[] = $row["disamount"];
                $subdata[] = $row["schedule"];
                $subdata[] = $row["modify_reson"];
                $subdata[] = $row["status"];


//                if ($row["is_Active"] === "1") {
//                    $subdata[] = "<span class='text-success'>Active</a>";
//                } else {
//                    $subdata[] = "<span class='text-danger'>In-Active</a>";
//                }
                $active = '<a href="/?r=uploadinvoice&id=' . $row['order_id'] . '" class="btn btn-danger btn-xs"> <i class="fa fa-file-pdf-o"></i></a>';
                $active .= ' <a href="/?r=orderdetails&id=' . $row['order_id'] . '" class="btn btn-primary btn-xs" > <i class="fa fa-edit"></i></button>';
//               
                $subdata[] = $active; // . ' <button onclick="suspendAccount(' . $row["id"] . ',' . $ac[$row["is_active"]] . ')" data-toggle="modal" data-target="#myModal" class="btn btn-' . $b[$row['is_active']] . ' btn-xs"> <i class="fa fa-scissors"></i>' . $b2[$row['is_active']] . '</button>';

                $data[] = $subdata;
            }
            $json_data = array(
                "draw" => intval($request['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFilter),
                "data" => $data,
            );
            echo json_encode($json_data);
        } catch (Exception $ex) {
            error_log($ex, 3, "error.log");
        }
    }

    function SearchloadTableDatewise() {
        try {
            $request = $_REQUEST;

            $col = array(
                0 => 'id',
                1 => 'order_id',
                2 => 'fname',
                3 => 'joining',
                4 => 'email',
                5 => 'contact',
                6 => 'status',
                7 => 'onCreate'
            );
            //$sql = "SELECT * FROM `orders` INNER JOIN user ON orders.uid=user.id";
            $sql = "SELECT orders.razorpay_order_id,orders.payment_id,orders.onCreate,orders.order_id,orders.id,orders.uid,orders.fname,orders.lname,orders.final_total,orders.payment_mode,orders.status,user.email,user.mobile FROM `orders` INNER JOIN user ON orders.uid=user.id";
            $query = $this->executeQuery($sql);
            $totalData = $query->num_rows;
            $totalFilter = $totalData;
            $sql .= " WHERE orders.fname LIKE '%{$_POST["search"]}%' OR orders.lname LIKE '%{$_POST["search"]}%' OR user.email LIKE '%{$_POST["search"]}%' OR user.mobile LIKE '%{$_POST["search"]}%' OR orders.order_id LIKE '%{$_POST["search"]}%'";
            //$sql .= $this->searchFullText(array('orders.razorpay_order_id', 'orders.payment_id', 'orders.onCreate', 'orders.order_id', 'orders.id', 'orders.uid', 'orders.fname', 'orders.lname', 'orders.final_total', 'orders.payment_mode', 'orders.status', 'user.email', 'user.mobile'), array($_POST["search"])); // . " AND orders.status='{$_POST["status"]}'";
            // echo $sql;
            //$sql .= $this->whereSingle(array("1" => "1"));
            /* Search */
            if (!empty($request['search']['value'])) {
                $sql .= " AND (orders.fname Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.lname Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.order_id Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  user.email Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.status Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  user.mobile Like '%" . $request['search']['value'] . "%')";
                //$sql .= $this->orderBy($request['order'][0]['dir'], $col[$request['order'][0]['column']]) . $this->ask_mysqli->limitWithOffset($request['start'], $request['length']);
            }
            //echo $sql;
            /* Order */
//            if (!empty($request['order'][0]['dir'])) {
//               // $sql .= $this->orderBy($request['order'][0]['dir'], $col[$request['order'][0]['column']]);
//            }
            $sql .= $this->limitWithOffset($request['start'], $request['length']);
            $query = $this->executeQuery($sql);
            $totalData = $query->num_rows;
            while ($row = $query->fetch_assoc()) {
                $subdata = array();
                $subdata[] = $row['id'];;
                $subdata[] = $row['order_id'];
                $subdata[] = $row['razorpay_order_id'];
                $subdata[] = $row['payment_id'];
                $subdata[] = $row['fname'] . " " . $row['lname'];

                $subdata[] = $row['mobile'];
                $subdata[] = $row['email'];
                $subdata[] = "₹ " . $row['final_total'];
                $subdata[] = $row['payment_mode'];
                $subdata[] = $row['status'];
                $subdata[] = $row['onCreate'];

//                if ($row["is_Active"] === "1") {
//                    $subdata[] = "<span class='text-success'>Active</a>";
//                } else {
//                    $subdata[] = "<span class='text-danger'>In-Active</a>";
//                }
                $active = '<a href="/?r=uploadinvoice&id=' . $row['order_id'] . '" class="btn btn-danger btn-xs"> <i class="fa fa-file-pdf-o"></i></a>';
                $active .= ' <a href="/?r=orderdetails&id=' . $row['order_id'] . '" class="btn btn-primary btn-xs" > <i class="fa fa-edit"></i></button>';
//               
                $subdata[] = $active; // . ' <button onclick="suspendAccount(' . $row["id"] . ',' . $ac[$row["is_active"]] . ')" data-toggle="modal" data-target="#myModal" class="btn btn-' . $b[$row['is_active']] . ' btn-xs"> <i class="fa fa-scissors"></i>' . $b2[$row['is_active']] . '</button>';

                $data[] = $subdata;
            }
            $json_data = array(
                "draw" => intval($request['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFilter),
                "data" => $data,
            );
            echo json_encode($json_data);
        } catch (Exception $ex) {
            error_log($ex, 3, "error.log");
        }
    }

    function loadTableDatewise() {
        try {
            $request = $_REQUEST;

            $col = array(
                0 => 'id',
                1 => 'order_id',
                2 => 'fname',
                3 => 'joining',
                4 => 'email',
                5 => 'contact',
                6 => 'status',
                7 => 'onCreate'
            );
            //$sql = "SELECT * FROM `orders` INNER JOIN user ON orders.uid=user.id";
            $sql = "SELECT orders.razorpay_order_id,orders.payment_id,orders.onCreate,orders.order_id,orders.id,orders.uid,orders.fname,orders.lname,orders.final_total,orders.payment_mode,orders.status,user.email,user.mobile FROM `orders` INNER JOIN user ON orders.uid=user.id";
            $query = $this->executeQuery($sql);
            $totalData = $query->num_rows;
            $totalFilter = $totalData;
            if (strcmp($_POST["status"], "All") == 0) {
                $sql .= $this->whereBetweenDate("orders.onCreate", array($_POST["starts"] . " 00:00:00", $_POST["end"] . " 23:59:59"), "AND"); // (array("1" => "1"));
            } else {
                $sql .= $this->whereBetweenDate("orders.onCreate", array($_POST["starts"] . " 00:00:00", $_POST["end"] . " 23:59:59"), "AND") . " AND orders.status='{$_POST["status"]}'";
            }
            // echo $sql;
            //$sql .= $this->whereSingle(array("1" => "1"));
            /* Search */
            if (!empty($request['search']['value'])) {
                $sql .= " AND (orders.fname Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.lname Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.order_id Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  user.email Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.status Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  user.mobile Like '%" . $request['search']['value'] . "%')";
                //$sql .= $this->orderBy($request['order'][0]['dir'], $col[$request['order'][0]['column']]) . $this->ask_mysqli->limitWithOffset($request['start'], $request['length']);
            }
            //echo $sql;
            /* Order */
//            if (!empty($request['order'][0]['dir'])) {
//               // $sql .= $this->orderBy($request['order'][0]['dir'], $col[$request['order'][0]['column']]);
//            }
            $sql .= $this->limitWithOffset($request['start'], $request['length']);
            $query = $this->executeQuery($sql);
            $totalData = $query->num_rows;
            while ($row = $query->fetch_assoc()) {
                $subdata = array();
                $subdata[] = $row['id'];
                $subdata[] = $row['order_id'];
                $subdata[] = $row['razorpay_order_id'];
                $subdata[] = $row['payment_id'];
                $subdata[] = $row['fname'] . " " . $row['lname'];

                $subdata[] = $row['mobile'];
                $subdata[] = $row['email'];
                $subdata[] = "₹ " . $row['final_total'];
                $subdata[] = $row['payment_mode'];
                $subdata[] = $row['status'];
                $subdata[] = $row['onCreate'];

//                if ($row["is_Active"] === "1") {
//                    $subdata[] = "<span class='text-success'>Active</a>";
//                } else {
//                    $subdata[] = "<span class='text-danger'>In-Active</a>";
//                }
                $active = '<a href="/?r=uploadinvoice&id=' . $row['order_id'] . '" class="btn btn-danger btn-xs"> <i class="fa fa-file-pdf-o"></i></a>';
                $active .= ' <a href="/?r=orderdetails&id=' . $row['order_id'] . '" class="btn btn-primary btn-xs" > <i class="fa fa-edit"></i></button>';
//               
                $subdata[] = $active; // . ' <button onclick="suspendAccount(' . $row["id"] . ',' . $ac[$row["is_active"]] . ')" data-toggle="modal" data-target="#myModal" class="btn btn-' . $b[$row['is_active']] . ' btn-xs"> <i class="fa fa-scissors"></i>' . $b2[$row['is_active']] . '</button>';

                $data[] = $subdata;
            }
            $json_data = array(
                "draw" => intval($request['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFilter),
                "data" => $data,
            );
            echo json_encode($json_data);
        } catch (Exception $ex) {
            error_log($ex, 3, "error.log");
        }
    }

    function loadTable() {
        try {
            $request = $_REQUEST;
            $col = array(
                0 => 'id',
                1 => 'order_id',
                2 => 'fname',
                3 => 'joining',
                4 => 'email',
                5 => 'contact',
                6 => 'status',
                7 => 'onCreate'
            );
            //$sql = "SELECT * FROM `orders` INNER JOIN user ON orders.uid=user.id";
            $sql = "SELECT orders.razorpay_order_id,orders.payment_id,orders.onCreate,orders.order_id,orders.id,orders.uid,orders.fname,orders.lname,orders.final_total,orders.payment_mode,orders.status,user.email,user.mobile FROM `orders` INNER JOIN user ON orders.uid=user.id";
            $query = $this->executeQuery($sql);
            $totalData = $query->num_rows;
            $totalFilter = $totalData;
            //$sql .= $this->whereSingle(array("1" => "1"));
            /* Search */
            if (!empty($request['search']['value'])) {
                $sql .= " AND (orders.fname Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.lname Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.order_id Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  user.email Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  orders.status Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  user.mobile Like '%" . $request['search']['value'] . "%')";
                //$sql .= $this->orderBy($request['order'][0]['dir'], $col[$request['order'][0]['column']]) . $this->ask_mysqli->limitWithOffset($request['start'], $request['length']);
            }
            /* Order */
//            if (!empty($request['order'][0]['dir'])) {
//               // $sql .= $this->orderBy($request['order'][0]['dir'], $col[$request['order'][0]['column']]);
//            }
            $sql .= $this->limitWithOffset($request['start'], $request['length']);
            $query = $this->executeQuery($sql);
            $totalData = $query->num_rows;
            while ($row = $query->fetch_assoc()) {
                $subdata = array();
                $subdata[] = $row['id'];
                $subdata[] = $row['order_id'];
                $subdata[] = $row['razorpay_order_id'];
                $subdata[] = $row['payment_id'];
                $subdata[] = $row['fname'] . " " . $row['lname'];

                $subdata[] = $row['mobile'];
                $subdata[] = $row['email'];
                $subdata[] = "₹ " . $row['final_total'];
                $subdata[] = $row['payment_mode'];
                $subdata[] = $row['status'];
                $subdata[] = $row['onCreate'];

//                if ($row["is_Active"] === "1") {
//                    $subdata[] = "<span class='text-success'>Active</a>";
//                } else {
//                    $subdata[] = "<span class='text-danger'>In-Active</a>";
//                }
                $active = '<a href="/?r=uploadinvoice&id=' . $row['order_id'] . '" class="btn btn-danger btn-xs"> <i class="fa fa-file-pdf-o"></i></a>';
                $active .= ' <a href="/?r=orderdetails&id=' . $row['order_id'] . '" class="btn btn-primary btn-xs" > <i class="fa fa-edit"></i></button>';
//               
                $subdata[] = $active; // . ' <button onclick="suspendAccount(' . $row["id"] . ',' . $ac[$row["is_active"]] . ')" data-toggle="modal" data-target="#myModal" class="btn btn-' . $b[$row['is_active']] . ' btn-xs"> <i class="fa fa-scissors"></i>' . $b2[$row['is_active']] . '</button>';

                $data[] = $subdata;
            }
            $json_data = array(
                "draw" => intval($request['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFilter),
                "data" => $data,
            );
            echo json_encode($json_data);
        } catch (Exception $ex) {
            error_log($ex, 3, "error.log");
        }
    }

}
