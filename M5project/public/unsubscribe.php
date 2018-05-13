<?php

ob_start();
include 'includes/security.php';
include 'includes/header.php';
?>

<style>
h2{
	margin-top: 200px;
	padding-left:500px;
}

input{
	margin-left:500px;
	margin-right: -200px;
}

body{
	background-color: #D6EAF8;
}

</style>

<h2>Do you wish to Unsubscribe?</h2>
<form method='post' name='confirmation'>
	<input type="submit" name="yes" value="yes">
	<input type="submit" name="no" value="no">
</form>


<?php
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

if(isset($_POST['yes'])){
	$id = $_GET['id'];
	$token = $_GET['token'];
	//echo $id;
	//echo $token;
		try {
			//Call out function to remove token in cp_tb_User
			$UM -> unsubscribe($id, $token);
			echo "<p style="color:red">User Unsubscribed from mailing service</p>";
			header("Location:login.php");
		} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	if(isset($_POST['no'])){
		header("Location:login.php");
	}