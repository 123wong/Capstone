<?php
session_start();
require_once 'includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include 'includes/security.php';
include 'includes/header.php';

$UM=new UserManager();
$users=$UM->getAllUsers();

if(isset($users)){
    ?>
	<body bgcolor="#ffe699">
	<link rel="stylesheet" href="css\pure-release-1.0.0\pure-min.css">
    <br>
	<h4><b>Below is the list of registered Users in community portal</b></h4>
    <br>
	<table class="pure-table pure-table-bordered" width="800">
	<col width="40">
	<col width="120">
	<col width="120">
	<col width="200">
	<col width="80">
	
    <tr>
	<thead>
        <th align="left"><b>Name</b></th>
        <th align="left"><b>Address</b></th>
        <th align="left"><b>Email</b></th>
        <th align="left"><b>Password</b></th>
	</thead>
    </tr> 
	
    <?php 
    foreach ($users as $user) {
        if($user!=null){
            ?>
            <tr>
                <td><?=$user->Name?></td>
                <td><?=$user->Address?></td>
                <td><?=$user->Email?></td>
                <td><?=$user->Password?></td>
            </tr>
            <?php
        }
    }
}
?>