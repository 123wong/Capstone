<?php
 ob_start();
// require_once 'includes/autoload.php';
// include 'includes/header.php';

include_once '../classes/business/UserManager.php';
include_once '../classes/data/UserManagerDB.php'; 
include_once '../classes/data/UserManagerDB.php'; 
include_once '../classes/util/Config.php';
include_once '../classes/util/DBUtil.php';
include_once '../classes/entity/User.php';
use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

$UM = new UserManager();
$allEmails = $UM->getAllUsers();
?>

<style>
input[type=text], select {
    width: 70%;
    padding: 15px 10px 20px 8px;
    margin: 10px 10px 20px 230px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 15%;
    
    background-color: #4CAF50;
    color: white;
    padding: 15px 10px 20px 8px;
    margin: 10px 10px 20px 230px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {

    background-color: #D6EAF8;
    border-width: 15px;
    text-align: center;
}

h3{
padding-top: 50px;
margin-left: 230px;
font-family: arial;
font-size: 24px;

}
label {
margin-left: 230px;
}

div{
background-color: #D6EAF8;
border-radius: 5px;
padding:8px;
}

.table{
   margin-left:220px;
   border-collapse: collapse;
}



</style>

<!-- <html> -->
<!-- <head> -->
<!-- <title>Email messages to Software Developer</title> -->
<!-- <link href="style.css" rel="stylesheet"> -->
<!-- </head> -->
<!-- Body Starts Here -->
<!-- <body bgcolor="#ffe699"> -->
<!-- <div class="container"> -->
<!-- Feedback Form Starts Here -->
<!-- <div id="feedback"> -->
<!-- Heading Of The Form -->
<!-- <!-- <div class="head">
<h3>Contact Us</h3>
<p>This is email messages sent to Software Developers !</p>
</div>
<!-- Feedback Form -->
<!-- <form id="form" method="post" name="form" action="SwiftMailer.php"> -->
<!-- <p>Email:</p><br> -->
<!-- <input name="recipient" placeholder="Recipient Email e.g. mail1@msn.com,mail2@msn.com" type="text" required value=""> -->

<!-- <p>Subject:</p><br> -->
<!-- <input name="subject" placeholder="Subject" type="text" value="" required>

<p>Message:</p><br>
<label>Message</label>
<textarea name="message" placeholder="Type your text here..." required></textarea>
<input id="send" name="submit" type="submit" value="Submit">
</form>
<!--  --> 

<body>
	
<div>

<h3>User List</h3>

<!--  <form method="post" name='submit' action="bulkmail.php">-->
<div class="table">
<form method="post" name='address'>
    <table border='1' width="697">

    <tr>
        <td><strong>User Email Address</strong></td>
        <td>Mail</td>
    </tr>
   
<?php

for($i=1; $i<count($allEmails); $i++){ 
?>
        <tr>
            <td><?=$allEmails[$i]->userEmail?></td>
            <td>
                <input type=checkbox name="checkbox[]" value='<?=$allEmails[$i]->userEmail?>'>
            </td>
        </tr>
    
<?php
}

?>
    </thead>
    </table>
</div>
    

    <input type="submit" name='address' value="Submit">
</form>

<?php
//To retrieve information from <form>address
if (isset($_POST['address']))
    if(isset($_POST['checkbox'])){
        $checkbox = $_POST['checkbox'];
    }
?>




<h3>Sent information to user</h3>

<!--  <form method="post" name='submit' action="bulkmail.php">-->
<form method="post" name='submit'>
    <label for="email">Email</label><br>
    <input type="text" id="email" name="email" placeholder="email" readonly value='
    <?php if (isset($checkbox)){
        echo (implode('; ', $checkbox)); }
    ?>'>
    <label for="subject">Subject</label><br>
    <input type="text" id="subject" name="subject" placeholder="subject">
	
    <label for="message">Message</label><br>
    <input type="text" id="message" name="message" placeholder="message">
 
    <input type="submit" name='submit' value="Submit">
</form>


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
$UM = new UserManager();
/*
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo("$email is a valid email address");
} else {
  echo("$email is not a valid email address");
}*/

if(isset($_POST['submit'])){
    if (isset($_POST['email'])) {
        //Converting the received Email from string to array format
        $trimmed = trim($_POST['email']);
        $result = explode('; ', $trimmed);
        //var_dump($result);
    }

    if (isset($_POST['subject'])) {
        //Converting the received Email from string to array format
        $subject = $_POST['subject'];
       // echo $subject;
    }

    if (isset($_POST['message'])) {
        //Converting the received Email from string to array format
        $message = $_POST['message'];
       //echo $message;
    }

    try {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = " in-v3.mailjet.com";  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = "0fb746ffb7ec7f6efd5fabc0c4800753";                 // SMTP username
        $mail->Password = "c63be08239330fa7adfd05ff96d8538f";                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25;  
        $mail->Subject = $subject;
        $mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead   
    
        foreach ($result as $recipient) {
        $mail->isHTML(true);
        $entry = $UM->getUserByEmail($recipient);
        
        $id =  $entry->userId;
        $userName =  $entry->userName;
        $token = $entry->subscribeToken;
        
        $link = "http://localhost/M5project/public/unsubscribe.php?id={$id}&token{$token}";
        $mail->addBCC($recipient, $userName);

        $body = "
        <p>Dear {$userName},</p>
        <p>{$message}</p>
        <p>Thanks and regards,</p>
        <p>Link for unsubsciption</p>
        <a href='{$link}'><p style='color:blue'>LINK</p></a>
        ";
        $mail->Body = $body;
      
        if (!$mail->send()) {
            echo "Mailer Error  ' . $mail->ErrorInfo . '<br />";
            break; //Abandon sending
        } else {
         // Clear all addresses and attachments for next loop
        $mail->clearAddresses();
        $mail->clearAttachments();
        $mail->ClearAllRecipients();
        }
        
      

       
    
    }
    }catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }









}


    




?>


</div>
<!-- Feedback Form Ends Here -->
</div>
</body>
<!-- Body Ends Here -->
</html>