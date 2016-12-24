<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Mailer {
 
    var $mail;
 
    public function __construct()
    {
        require_once('PHPMailer_5.2.16/PHPMailerAutoload.php');
 
        // the true param means it will throw exceptions on errors, which we need to catch
        $this->mail = new PHPMailer(true);
 
        $this->mail->IsSMTP(); // telling the class to use SMTP
 
        $this->mail->CharSet = "utf-8";                  // 一定要設定 CharSet 才能正確處理中文
        $this->mail->SMTPDebug  = 0;                     // enables SMTP debug information
        $this->mail->SMTPAuth   = true;                  // enable SMTP authentication
        $this->mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $this->mail->Host       = "smtp.126.com";      // sets GMAIL as the SMTP server
        $this->mail->Port       = 465;                   // set the SMTP port for the GMAIL server
        $this->mail->Username   = "wellcee@126.com";// GMAIL username
        $this->mail->Password   = "wellcee654321";       // GMAIL password
        //$this->mail->AddReplyTo('wellcee@126.com', 'wellcee');
        //$this->mail->SetFrom('wellcee@126.com', 'wellcee');
    }
 
/*    public function sendmail($to, $to_name, $subject, $body){
        try{
            $this->mail->AddAddress($to, $to_name);
 
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
 
            $this->mail->Send();
                echo "Message Sent OK</p>\n";
 
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
        }
    }*/

        public function sendmail($to, $to_name, $subject, $body){
 
        try{
 
            $this->mail->From = 'wellcee@126.com';
 
            $this->mail->FromName = 'wellcee';
 
            $this->mail->AddAddress($to, $to_name);
 
             
 
            $mail->WordWrap = 500;                                 // Set word wrap to 5000 characters
 
            $this->mail->IsHTML(true);                                  // 使用html格式
 
 
 
            $this->mail->Subject = $subject;
 
            $this->mail->Body    = $body;
 
 
 
  
 
            $this->mail->Send();
 
                echo "Message Sent OK</p>\n";
 
  
 
        } catch (phpmailerException $e) {
 
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
 
        } catch (Exception $e) {
 
            echo $e->getMessage(); //Boring error messages from anything else!
 
        }
 
    }
}
 
/* End of file mailer.php */