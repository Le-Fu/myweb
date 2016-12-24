<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Email_sender extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function send(){
        $useremail = '1628629915@qq.com';
        $email = $this -> input -> post('useremail');
        $name = $this -> input -> post('username');
        $content = $this -> input -> post('emailcontent');
        $mail_body = "用户邮箱：".$email."<br/>用户名：".$name."<br/>他说:<br/>".$content;
        $this->load->library('mailer');
        $this->mailer->sendmail(
            $useremail,
            '亲爱的用户',
            '时间'.date('Y-m-d H:i:s'),
            $mail_body
        );
    }

}