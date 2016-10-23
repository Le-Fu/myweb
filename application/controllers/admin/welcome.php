<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct(){
        parent::__construct();
            $this -> load -> model('admin_model');
//          $this -> load -> model('blog_category_model');
//          $this -> load -> model('blog_model');
//          $this -> load -> model('comment_model');
    }

    public function login(){
        $this -> load -> view('admin/login');
    }

    public function index(){
        $this -> load -> view('admin/admin_index');
    }

    public function do_login()
    {
        $email = $this -> input -> post('email');
        $pwd = $this -> input -> post('pwd');
        $row = $this -> admin_model -> get_by_email_pwd($email, $pwd);
        if($row > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

}