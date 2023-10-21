<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';


class Database
{
    private $dbServername = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $connection;

    public function __construct( ) {
        $this->connection = new PDO("mysql:host=$this->dbServername;dbname=capstone", $this->dbUsername, $this->dbPassword);

       // set the PDO error mode to exception
       $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
   }


    public function getConnection() {
       return $this->connection;
   }

   public function sendEmail($recipient,$subject, $message, $attachment= 'default'){
       
    // create a new PHPMailer object
    $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '3gclothingline.noreply@gmail.com';
    $mail->Password = 'aguqhplqhbhvejvr';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //recipients
    $mail->setFrom('3gclothingline.noreply@gmail.com','3gclothingline');
    $mail->addAddress($recipient);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if($attachment != 'default'){
        $mail->addAttachment($attachment['tmpName'],$attachment['name']);
    }

    //Send the email
    if (!$mail->send()) {
        echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
    } 
}

}