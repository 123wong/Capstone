<?php
use classes\business\UserManager;
use classes\business\Validation;
include 'includes\header.php';

//require_once 'includes/autoload.php';
require_once 'includes/autoload.php';
//include 'includes/header.php';


//PHPMailer section - Start
require '../vendor/phpmailer/phpmailer/phpmailer.php';
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
//PHPMailer section - End


$formerror="";

$email="";
$password="";
$error_auth="";
$error_name="";
$error_passwd="";
$error_email="";
//$validate=new Validation();



if($_SERVER['REQUEST_METHOD'] == "POST")
{
$connect=mysql_connect("localhost","root","Abcd1234");
//$connect=mysql_connect("127.0.0.1","cfwong","Abcd1234");
//mysql_select_db("cfwong"); 
mysql_select_db("m4schema"); 
$email=$_POST["email"];
$UM=new UserManager();

$existuser=$UM->getUserByEmail($email);

    
    if($existuser){  
        //generate new password
        $newpassword=$UM->randomPassword();  
        //update database with new password
        $UM->userpassword($email,$newpassword); 
        $msg="Valid email user. password: ".$newpassword;
        $formerror="New password sent to your email.";
        //coding for sending email
        // do work here
        //echo 'EMAIL: '.$email;
        //$email=$row["email"]; 
        $content="Your password is ".$newpassword; //IMPORTANT!!!
        
        //NEW PHPMailer - START
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = " in-v3.mailjet.com";  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = "0fb746ffb7ec7f6efd5fabc0c4800753";                 // SMTP username
            $mail->Password = "c63be08239330fa7adfd05ff96d8538f";                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom("mgfoong638@gmail.com", 'Mailer');
            //$mail->addAddress("mgfoong@yahoo.com.sg");     // Add a recipient         
            $mail->addAddress($email);
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Request for password reset - ABC Jobs Pte Ltd';
            $mail->Body    = $content;
            $mail->AltBody = $content;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        //NEW PHPMailer -END        
}
    
}
?>


<style>
	#forget-password {
		padding: 40px 30px;
	}

    body {
        background-image: url(images/peaceful.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 100vh;
    }
</style>


    <!-- PAGE CONTENT -->
    <div id="content">
        <div class="container container-fluid">
        	<div class="container">
				<div class="row">
                	<div class="column col-xs-12 col-sm-8 col-md-6 col-lg-6 col-md-offset-3 col-sm-offset-2 col-lg-offset-3">
	                    <div id="forget-password" class="panel-white text-center">
	                    	<h2 style="margin-top:0;">Forgot password?</h2>
							<p class="lead">
								We just need your registered email address
								to send you password reset
							</p>
	                        <form action="" method="post">
	                        	<div class="form-group">
	                                <input type="email" class="form-control input-lg" placeholder="email address" name="email">
	                            </div>
	                            <div class="form-group">
			             <!-- <button type="button" class="btn btn-info btn-lg btn-black btn-block">submit</button> -->
                                 <input type="submit">
                                    <!-- <h2><a href="forgetpasswordconfirm.php">submit</a></h2> -->
                              
			              		</div>
	                        </form>
                            <
	                    </div>
	              	</div>
            	</div>
        	</div>
    	</div>
	</div>


</body>

</html>