<?php
include 'includes/header.php';
?>

    <style>
    #registration-form {
        padding: 30px;
    }

    body {
        background-image: url(images/Kids.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 100vh;
    }
    </style>
</head>


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
                                <a href="login.php" type="button" class="btn btn-info btn-md btn-black">Login</a>
            				</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>