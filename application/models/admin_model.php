<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get_by_email_pwd($email, $pwd){
        return $this -> db -> get('t_admin') -> row();
    }
}