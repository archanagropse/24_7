<?php

class Login extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function admin_login($username, $password){
        $password = sha1($password);

        $q = $this->db->where(['username' => $username, 'password' => $password])->get('admin');

        if ($q->num_rows()) {
            return $q->row_array();
        } else {
            return FALSE;
        }
    }
}

?>