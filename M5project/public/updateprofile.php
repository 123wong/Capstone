<?php
// Start the session
session_start();
?>

<?php
require_once 'includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include 'includes/security.php';
include 'includes/header.php';
?>

<?php

$formerror="";
$userName="";
$userAddress="";
$userEmail="";
$userPassword="";

if(!isset($_REQUEST["submitted"])){
  if (isset($_SESSION["email"])){  
    $UM=new UserManager();
    $existuser=$UM->getUserByEmail($_SESSION["email"]);
    $userName=$existuser->userName;
    $userAddress=$existuser->userAddress;
    $userEmail=$existuser->userEmail;
    $userPassword=$existuser->userPassword;
    $subscribe=$existuser->subscribeToken;
  }else{
    echo '<meta http-equiv="Refresh" content="1; url=login.php">';
  }
}

else{
  $userName=$_REQUEST["userName"];
  $userAddress=$_REQUEST["userAddress"];
  $userEmail=$_REQUEST["userEmail"];
  $userPassword=$_REQUEST["userPassword"];
  if (isset($_REQUEST["checkbox"])) {
    $subscribe = md5($userEmail);
  } else {
    $subscribe = null;
  }


  if($userName!='' && $userAddress!='' && $userEmail!='' && $userPassword!=''){
       $update=true;
       $UM=new UserManager();
       if($userEmail!=$_SESSION["email"]){
           $existuser=$UM->getUserByEmail($userEmail);
           if(is_null($existuser)==false){
               $formerror="User Email already in use, unable to update email";
               $update=false;
           }
       }
       if($update){
           $existuser=$UM->getUserByEmail($_SESSION["email"]);
           $existuser->userName=$userName;
           $existuser->userAddress=$userAddress;
           $existuser->userEmail=$userEmail;
           $existuser->userPassword=$userPassword;
           $existuser->subscribeToken=$subscribe; 
           $UM->updateUser($existuser);
           $_SESSION["email"]=$userEmail;
       }
  }else{
      $formerror="Please provide required values";
  }
}
?>
<style>
h1 {margin-top: 100px;
}

#table{
   width: 697px;margin:0 auto;
  }

  table{
  background-color: white;
  border-collapse: collapse;
  padding-left: 15px;
  padding-right: 30px;
}

.col{
  background-color: lightgrey;
  padding:10px;
  padding-bottom: 5px;
  border-bottom: 5px;
  padding-left: 15px;
 }

 input{
  border:5px;
  padding-left: 15px;
  height: 50px;
}

body{
  background-color: #D6EAF8;
}

p{
  padding-top: 10px;
  height: 5px;

}
.subscribe{
  padding-left: 15px;

}



</style>
<div id="table">
<form name="myForm" method="post">
<h1>Update Profile</h1>
<div><?=$formerror?></div>
<table border='1' width="697">

  <tr>
    <td class="col" >Name</td>
    <td><input type="text" name="userName" value="<?=$userName?>" size="100"></td>
  </tr>
  <tr>
    <td class="col">Address</td>
    <td><input type="text" name="userAddress" value="<?=$userAddress?>" size="100"></td>
  </tr>
  <tr>
    <td class="col">Email</td>
    <td><input type="text" name="userEmail" value="<?=$userEmail?>" size="50"></td>
  </tr>
  <tr>
    <td class="col">Password</td>
    <td><input type="password" name="userPassword" value="<?=$userPassword?>" size="20"></td>
  </tr>
  <tr>
    <td class="col">Confirm Password</td>
    <td><input type="password" name="cuserPassword" value="<?=$userPassword?>" size="20"></td>
  </tr>
</td>
</div>
</div>

<div class="subscribe">
  <table border='1' width="600">
  <tr>

    <td><p>Subscription Status</p>
      <input type="checkbox" name="checkbox"
        <?php 
          if($subscribe){
            echo "checked";
        }
        ?>
        >
      </td>
  </tr>
  </div>

  <tr>
    <td colspan="2" align="right">
       <input type="hidden" name="submitted" value="1"><a href="unsubscribe.php">Submit</a>
       <input type="submit" name="clear" value="Clear Search" onclick="javascript:clearForm();">
    </td>
  </tr>
</div>
</table>
</form>

