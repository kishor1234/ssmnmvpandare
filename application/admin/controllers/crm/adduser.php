<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addemployee
 *
 * @author asksoft
 */
//die(APPLICATION);
//require_once getcwd() . '/' . APPLICATION . "/controllers/Crout.php";
require_once controller;

class adduser extends CAaskController {

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

        return;
    }

    public function execute() {
        parent::execute();
        switch ($_POST["action"]) {
            case "loadTable";
                $this->loadTable();
                break;
            case "addUser":
                $this->addUser();
                break;
            case "delete":
                $this->deleteUser();
                break;
            case "update":
                $this->updates();
                break;
            case "delete":
                $this->deleteUser();
                break;
            default :
                //$this->loadTable();
                $postdata = file_get_contents("php://input");
                $request = json_decode($postdata, true);
                print_r($request);
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

    function deleteUser() {
        $data = $_POST;
        //print_r($data);die;
        $where = $this->whereSingle(array("id" => $data["id"]));
        $this->adminDB[$_SESSION["db_1"]]->autocommit(false);
        $sql = $this->delete("staff") . $where;
        $this->adminDB[$_SESSION["db_1"]]->query($sql) != true ? array_push($error, $this->adminDB[$_SESSION["db_1"]]->error) : true;

        if (empty($erroe)) {
            $this->adminDB[$_SESSION["db_1"]]->commit();
            echo json_encode(array("toast" => array("success", "User", " Delete User Success.."), "status" => 1, "message" => "Delete User Success... "));
        } else {
            $this->adminDB[$_SESSION["db_1"]]->rollback();
            $json_error = json_encode($erroe);
            echo json_encode(array("toast" => array("danger", "User", " Delete User  failed {$json_error}"), "status" => 0, "message" => "Delete User  Failed.. {$json_error}"));
        }
    }

    function updates() {
        try {
            $data = $_POST;
            unset($data['action']);
            $where = $this->whereSingle(array("id" => $data["id"]));
            unset($data[["id"]]);
            $error = array();
            $this->adminDB[$_SESSION["db_1"]]->autocommit(false);
            $sql = $this->update($data, "staff") . $where;
            $this->adminDB[$_SESSION["db_1"]]->query($sql) != true ? array_push($error, $this->adminDB[$_SESSION["db_1"]]->error) : true;
            if (empty($error)) {
                $this->adminDB[$_SESSION["db_1"]]->commit();
                $json_error = json_encode($error);
                echo json_encode(array("toast" => array("success", "User", "Information Update Succesfully.."), "status" => 1, "message" => "User Information Update Successfully.."));
            } else {
                $this->adminDB[$_SESSION["db_1"]]->rollback();
                $json_error = json_encode($error);
                echo json_encode(array("toast" => array("danger", "User", "Information Update Failed... {$json_error}"), "status" => 0, "message" => "User Information Update Failed.. {$json_error}"));
            }
        } catch (Exception $ex) {
            
        }
    }

    function loadTable() {
        try {
            $request = $_REQUEST;
            $col = array(
                0 => 'id',
                1 => 'fname',
                2 => 'lname',
                3 => 'gender',
                4 => 'email',
                5 => 'mobile',
                6 => 'onCreate'
                
            );
            $sql = "SELECT user.onCreate,user.id,user.email,user.mobile,profile.gender,profile.fname,profile.lname FROM `profile` INNER JOIN user ON profile.uid=user.id";
            $query = $this->executeQuery($sql);
            $totalData = $query->num_rows;
            $totalFilter = $totalData;
            //$sql .= $this->whereSingle(array("1" => "1"));
            /* Search */
            if (!empty($request['search']['value'])) {
                $sql .= " AND (profile.fname Like '%" . $request['search']['value'] . "%'";
                $sql .= " OR  profile.mobile Like '%" . $request['search']['value'] . "%')";
                //$sql .= $this->orderBy($request['order'][0]['dir'], $col[$request['order'][0]['column']]) . $this->ask_mysqli->limitWithOffset($request['start'], $request['length']);
            }
            /* Order */
            $sql .= $this->orderBy($request['order'][0]['dir'], $col[$request['order'][0]['column']]) . $this->limitWithOffset($request['start'], $request['length']);
            $query = $this->executeQuery($sql);
            $totalData = $query->num_rows;
            while ($row = $query->fetch_assoc()) {
                $subdata = array();
                $subdata[] = $row['id'];
                $subdata[] = $row['fname'];
                $subdata[] = $row['lname'];
                $subdata[] = $row['gender'];
                $subdata[] = $row['email'];
                $subdata[] = $row['mobile'];
                $subdata[] = $row['onCreate'];

                
                $active = '<button onclick="deleteFullAccount(' . $row["id"] . ',0)" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></button>';
                $active .= ' <button onclick="editAccount(' . $row["id"] . ',\'' . $row["fname"] . '\',\'' . $row["contact"] . '\',\'' . $row["email"] . '\',\'' . $row["joining"] . '\',\'' . $row["gender"] . '\')" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i></button>';
//                $active .= ' <button onclick="putPoint(' . $row["userid"] . ',\'' . $row["name"] . '\',\'' . $row["balance"] . '\')" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i>Add Point</button>';
//                $active .= ' <button onclick="getPoint(' . $row["userid"] . ',\'' . $row["name"] . '\',\'' . $row["balance"] . '\')" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i>Remove Point</button>';
//                $b = array(1 => "danger", 0 => "success");
//                $b2 = array(1 => "Suspend", 0 => "Active");
//                $ac = array(0 => 1, 1 => 0);
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

    function addUser() {
        $data = $_POST;
        unset($data["id"]);
        unset($data["action"]);
        // $data["ip"] = $_SERVER["REMOTE_ADDR"];
        $data["is_Active"] = 1;
        //$data["create_on"] = date("Y-m-d");
        $this->adminDB[$_SESSION["db_1"]]->autocommit(false);
        $sql = $this->insert("staff", $_SESSION["db_1"], $data);
        $error = array();
        $this->adminDB[$_SESSION["db_1"]]->query($sql) != true ? array_push($error, $this->adminDB[$_SESSION["db_1"]]->error) : true;
        if (empty($error)) {
            $this->adminDB[$_SESSION["db_1"]]->commit();
            echo json_encode(array("toast" => array("success", "User", " Added Successfully"), "status" => 1, "message" => "Insert Successfully.."));
        } else {
            $json_error = json_encode($error);
            $this->adminDB[$_SESSION["db_1"]]->rollback();
            echo json_encode(array("d" => $data, "toast" => array("danger", "User", " Added failed {$json_error}"), "status" => 0, "message" => "Insert Failed.. {$json_error}"));
        }
    }

}
