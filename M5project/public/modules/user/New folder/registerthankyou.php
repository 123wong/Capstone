<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/main.css">
    <style>
    #registration-form {
        padding: 30px;
    }

    body {
        background-image: url(../../images/Wild.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 100vh;
    }
    </style>
</head>
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
                	<images class="brand-image" src="../../images/HC-NETWORK-LOGO-resized.png">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
				<form class="navbar-form navbar-right">
					<div class="form-group input-group">
						<input type="text" class="form-control" placeholder="Search">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div>
				</form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/M5project/public/modules/user/home.php">Home</a></li>
                    <li><a href="/M5project/public/modules/user/profile.php">Profile</a></li>
                    <li><a href="#">Message</a></li>
                    <li><a href="/M5project/public/modules/user/register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- PAGE CONTENT -->
    <div id="content-wrapper">
        <div id="content">
            <div class="container container-fluid text-center">
                <div class="row">
                    <div class="column col-xs-12 col-sm-8 col-md-6 col-lg-4 col-md-offset-3 col-sm-offset-2 col-lg-offset-4 ">
                        <div id="registration-confirmation" class="panel panel-white">
                          	<h1>Confirmation!</h1>
            				<p>Thank you for signing up!</p>
                            <div class="form-group">
                                <a href="../../login.php" type="button" class="btn btn-info btn-md btn-black">Login</a>
            				</div>
                        </div>
                    </div>
                </div>
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
</body>
</html>