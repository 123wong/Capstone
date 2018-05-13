<?php 
   if(isset($_SESSION["email"])){
       ?>
       <a href="M5project/public/home.php">Home</a> &nbsp;
       <a href="M5project/public/profile.php">Profile</a> &nbsp;
       <a href="M5project/public/contact.php">Contact</a> &nbsp;
<!--        <a href="M5project/public/forgetpasswordconfirm.php">forgetpasswordconfirm</a> &nbsp; -->
       <a href="M5project/public/register.php">Register</a> &nbsp;
       <?php 
   }
?>

<?php

include_once '../classes/business/UserManager.php';
include_once '../classes/data/UserManagerDB.php'; 
include_once '../classes/util/Config.php';
include_once '../classes/util/DBUtil.php';
include_once '../classes/entity/User.php';


use classes\business\UserManager;

?>

<html>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>

<style>
	
/* To align the login form in the middle of the page */
#content {
    display: table;
    width: 100%;
    min-height: 100vh;
    padding-top: 50px;
    padding-bottom: 50px;
}

#content>* {
    display: table-cell;
    vertical-align: middle;
}

#content-no-min-height {
    padding-top: 50px;
    padding-bottom: 80px;
}
.navbar-turquoise {
    background: #87f4f5;
}

.navbar-turquoise .nav>li>a {
    color: #000;
}

.navbar-turquoise .nav>li>a:hover {
    color: #fff;
    background-color: #000;
}

.navbar-default .navbar-toggle {
    border-color: #000;
}

.navbar-default .navbar-toggle .icon-bar {
    background-color: #000;
}


.navbar-brand {
    padding-top: 0;
    padding-bottom: 0;
}

.brand-image {
    width: auto;
    height: 40px;
    margin: 5px;
}

</style>

	<!-- PAGE HEADER -->
	<div class="navbar navbar-default navbar-turquoise navbar-fixed-top">
    	<div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                	<img class="brand-image" src="images/HC-NETWORK-LOGO-resized.png">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
				
				<form class="navbar-form navbar-right" method='post' name='search' action='http://localhost/M5project/public/searchResult.php'>
					<div class="form-group input-group">
						<input type="text" class="form-control" placeholder="Search" name="search">
						<div class="input-group-btn">
						<button class="btn btn-default" type="submit" name='submitForm'>
						<i class="glyphicon glyphicon-search"></i>
					</button>
                </div>
            </div>
				</form>
				
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="register.php">Register</a></li>
                    <!-- <a class="text-link" href="logout.php">Logout</a> -->
                </ul>
            </div>
        </div>
    </div>

    
        <!-- PAGE FOOTER -->
    <div class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container">
            <div class="navbar-text">
                <ul class="list-inline" style="margin-bottom:0;">
                    <li>Copyright © Your Website</li>
                    <li>|</li>
                    <li><a href="">Privacy Policy</a></li>
                    <li>|</li>
                    <li><a href="">Terms of Use</a></p></li>
                </ul>
            </div>
        </div>
    </div>