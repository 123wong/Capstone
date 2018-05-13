<?php

// require 'includes/autoload.php';
require '../vendor/phpmailer/phpmailer/phpmailer.php';
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

//use PHPMailer\PHPMailer\PHPMailer;
error_reporting(E_STRICT | E_ALL);
date_default_timezone_set('Etc/UTC');


$result='';
$subject='';
$message='';


if(isset($_POST['submit'])){
    if (isset($_POST['email'])) {
        //Converting the received Email from string to array format
        $result = explode('; ', $_POST['email']);
    }

    if (isset($_POST['subject'])) {
        //Converting the received Email from string to array format
        $subject = $_POST['subject'];
    }

    if (isset($_POST['message'])) {
        //Converting the received Email from string to array format
        $message = $_POST['message'];
    }
}
var_dump($result);

echo $subject;

echo $message;

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 3;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = " in-v3.mailjet.com";  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "0fb746ffb7ec7f6efd5fabc0c4800753";                 // SMTP username
    $mail->Password = "c63be08239330fa7adfd05ff96d8538f";                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;  
    $mail->Subject = $subject;
       




var_dump($result);
foreach ($result as $row) {
    //Connect to the database and select the recipients from your mailing list that have not yet been sent to
//You'll need to alter this to match your database
$mysql = mysqli_connect("127.0.0.1","root", "Abcd1234");
mysqli_select_db($mysql, 'm4schema');
$result = mysqli_query($mysql, 'SELECT UserName, UserEmail from cp_tb_user WHERE usertype = user');

    $mail->addAddress($row['UserEmail'], $row['UserName']);
    
    
    if (!$mail->send()) {
        echo "Mailer Error (" . str_replace("@", "&#64;", $row["UserEmail"]) . ') ' . $mail->ErrorInfo . '<br />';
        break; //Abandon sending
    } else {
        echo "Message sent to :" . $row['UserName'] . ' (' . str_replace("@", "&#64;", $row['UserEmail']) . ')<br />';
        //Mark it as sent in the DB
    }
    
    //Same body for all messages, so set this before the sending loop
    //If you generate a different body for each recipient (e.g. you're using a templating system),
    //set it inside the loop
    //$mail->msgHTML($body );
    //msgHTML also sets AltBody, but if you want a custom one, set it afterwards
    //$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';


    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
}
}catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>