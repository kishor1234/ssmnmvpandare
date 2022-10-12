<?php

class lock {

    function lock() {
        
    }

    function getData() {
        $myfile = fopen("lock.txt", "r") or die("Unable to open file!");
        $data=fread($myfile, filesize("lock.txt"));
        fclose($myfile);
        return $data;
    }
    function getDataIndex() {
        $myfile = fopen(getcwd()."/lock.txt", "r") or die("Unable to open file!");
        $data=fread($myfile, filesize(getcwd()."/lock.txt"));
        fclose($myfile);
        
        return $data;
    }

}

?>