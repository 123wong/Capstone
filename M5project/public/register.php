<?php
ob_start();
require_once 'includes/autoload.php';
include 'includes/header.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

$formerror="";

$UserName="";
$UserAddress="";
$UserEmail="";
$UserPassword="";

if ($_SERVER['REQUEST_METHOD']=="POST"){
    
    $UserName=$_REQUEST["Name"];
    $UserAddress=$_REQUEST["Address"];
    $UserEmail=$_REQUEST["Email"];
    $UserPassword=$_REQUEST["Password"];
    
    if($UserName!='' && $UserAddress!='' && $UserEmail!='' && $UserPassword!=''){

        $UM=new UserManager();
        $user=new User();

        $user->userName=$UserName;
        $user->userAddress=$UserAddress;
        $user->userEmail=$UserEmail;
        $user->userPassword=$UserPassword;
        
        $existuser=$UM->getUserByEmail( $UserEmail);
        
        if(!isset($existuser)){
            // Save the Data to Database
            $UM->saveUser($user);
            header("Location:registerthankyou.php");
        }
        else{
            $formerror="User Already Exist";
        }
    }else{
        $formerror="Please fill in the fields";
    }
}


?>
<!-- <form name="myForm" method="post"> -->

<style>
    #registration-form {
        padding: 30px;
    }
    body {
        background-image: url(images/Wild.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 100vh;
    }
    </style>

<!-- PAGE CONTENT -->
<div id="content-wrapper">
    <div id="content">
        <div class="container container-fluid">
            <div class="row">
                <div class="column col-xs-12 col-sm-8 col-md-6 col-lg-4 col-md-offset-3 col-sm-offset-2 col-lg-offset-4">
                    <div id="registration-form" class="panel-white">
                        <form method="post">
                            <div class="form-group">
                                <h2 class="text-left" style="margin-top:0;">Registration Form</h2>
                            </div>
                            <div class="form-group">
                                <input type="UserName" class="form-control" placeholder="Username" name="Name">
                            </div>
                            <div class="form-group">
                                <input type="UserAddress" class="form-control" placeholder="UserAddress" name="Address">
                            </div>
                            <div class="form-group">
                                <input type="UserEmail" class="form-control" placeholder="UserEmail" name="Email">
                            </div>
                             <div class="form-group">
                                <input type="UserPassword" class="form-control" placeholder="UserPassword" name="Password">
                            </div>
                            <div class="form-group text-right" style="margin-bottom: 0;">
                                <button type="submit" class="btn btn-info btn-black">Sign in</button>
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