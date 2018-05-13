<?php
// Start the session
session_start();
?>

<?php
//ob_start();
//use classes\business\UserManager;
// require_once 'includes/autoload.php';
include 'includes/header.php';
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';

$formerror="";

$email="";
$password="";
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];

    $UM=new UserManager();

    $existuser=$UM->getUserByEmailPassword($email,$password);
    if(isset($existuser)){
        //fill in what happen after you press enter/login
        $_SESSION['user'] = serialize($existuser);
        $_SESSION['email']=$email;
        $_SESSION['id']=$existuser->userId;
        echo '<meta http-equiv="Refresh" content="1; url=home.php">';
    }else{
        $formerror="Invalid User Name or Password";
    }
}
        //$formerror="";

$email="";
$password="";
$error_auth="";
$error_name="";
$error_passwd="";
$error_email="";
$validate=new Validation();

if(isset($_POST["Reset Password"])){
    $email=$_POST["email"];
    $password=$_POST["password"];
    if($validate->check_password($password, $error_passwd))
    {
        $UM=new UserManager();

        $existuser=$UM->getUserByEmailPassword($email,$password);
        if(isset($existuser)){
            $_SESSION['user'] = serialize($existuser);
            $_SESSION['email']=$email;
            $_SESSION['id']=$existuser->id;
            $_SESSION['role']=$existuser->role;
            echo '<meta http-equiv="Refresh" content="1; url=home.php">';
        }else{
            $formerror="Invalid User Name or Password";
        }
    }
}



?>


<style>
    /* * { outline: 1px #f00 solid; } */

    body {
        background-image: url(images/Presence.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 100vh;
    }
        #content {
            display: table;
            width: 100%;
            min-height: 100vh;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        #content>* {
            display: table-cell;
            text-align: center;
            vertical-align: middle;}

            #login-form {
        background: rgba(255, 255, 255, 0.6);
        padding: 50px;}
</style>

    <!-- PAGE HEADER -->
 
    <!--PAGE CONTENT -->
    <div id="content-wrapper">
        <div id="content">
            <div class="container container-fluid">
                <div class="row">
                    <div class="column col-xs-12 col-sm-8 col-md-6 col-lg-4 col-md-offset-3 col-sm-offset-2 col-lg-offset-4">
                        <div id="login-form" class="panel-white">
                            <form method="post">
                                <div class="form-group">
                                    <h2 class="text-left" style="margin-top:0;">Login to Your Account</h2>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control input-lg" placeholder="Username" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control input-lg" placeholder="Password" name="password">
                                </div>
                                <div class="form-group">
                                    <!-- <label><?=$formerror?></label>> -->
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-black btn-block btn-lg">Login</button>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 0;">
                                    <a class="text-link" href="forgetpassword.php">Forget Password?</a>
                                    <!-- <a class="text-link" href="logout.php">Logout</a> -->
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>

</html>