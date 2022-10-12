<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CreateUserModel
 *
 * @author atharv
 */
class CreateUserModel extends CI_Model {

    public $title;
    public $content;
    public $password;

    public function get_last_ten_entries() {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function insert_user() {
        $this->title = $_POST['email']; // please read the below note
        $this->content = $_POST['mobile'];
        $this->password = $_POST['password'];

        $this->db->insert('user', $this);
    }

    public function update_entry() {
        $this->title = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}
