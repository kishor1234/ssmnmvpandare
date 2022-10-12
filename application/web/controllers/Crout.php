<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//require_once getcwd()."/poolApp/CpoolControl.class.php";
require_once getcwd() . '/AaskAPP/CAaskController.php';

class Crout extends CAaskController {

    public function __construct() {
        parent::__construct();
        //print_r($_REQUEST);die;
    }

    public function create() {
        parent::create();
        if (!isset($_SESSION["email"])) {
            $_SESSION["msg"] = "";
            $result = $this->adminDB[$_SESSION["db_1"]]->query($this->select("collegeinfo", $_SESSION["db_1"]) . $this->whereSingle(array("id" => "1")));
            if ($row = $result->fetch_assoc()) {
                $this->session_set($row);
            }
        }
    }

    public function initialize() {
        parent::initialize();
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
        return;
    }

    public function distory() {
        return;
    }

    public function index() {
        //print_r($_REQUEST);die;
        $this->create();
        
        $_SESSION["mData"] = array();
        $r = $_REQUEST['r'];
        $v = $_REQUEST['v'];
        $sql = $this->select("menu", $_SESSION["db_1"]) . $this->whereSingle(array("title" => $r));
        $result = $this->executeQuery($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $_SESSION["mData"] = $row;
            }

            $_REQUEST['r'] = $_SESSION["mData"]["controller"];
        } else {
            $r = $_REQUEST['r'];
            $v = $_REQUEST['v'];
            $_REQUEST["r"] = $r;
            $_REQUEST["c"] = $v;
        }

        if (isset($_REQUEST['r'])) {
            $moduleName = $this->encript->decdata($_REQUEST["r"]);
            if (array_key_exists($moduleName, $this->controllerAppConfig) == FALSE) {
                $strFullDetail = $this->removePhpExtenstion($this->controllerAppConfig["Cpage_404"]);
            } else {
                $strFullDetail = $this->removePhpExtenstion($this->controllerAppConfig[$moduleName]);
            }
        } else {
            $strFullDetail = $this->removePhpExtenstion($this->controllerAppConfig["main"]);
        }
        //echo $strFullDetail["fullPath"];die;

        require_once $strFullDetail["fullPath"];
        $controlObject = new $strFullDetail["class"];
        $controlObject->create();
        $controlObject->initialize();
        $controlObject->execute();
        $controlObject->finalize();
        $controlObject->reader();
        $controlObject->distory();
    }

    public function getPostArray() {
        $array = array();
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                $array[$key] = $value;
            }
        }

        return $array;
    }

    public function removePhpExtenstion($filePath) {
        $strArrayfullDetail;
        $strControlfullPath = dirname(__FILE__) . "/" . $filePath;
        $strArray = explode("/", $strControlfullPath);
        $strClassName = explode(".", $strArray[count($strArray) - 1]);

        if (false != file_exists($strControlfullPath)) {

            if (class_exists($strControlfullPath, FALSE) == FALSE) {
                //require_once($strControlfullPath . "");

                $strArrayfullDetail["fullPath"] = $strControlfullPath;
                $strArrayfullDetail["class"] = $strClassName[0];
            }
        } else {
            die("file not found");
        }
        return $strArrayfullDetail;
    }

}
