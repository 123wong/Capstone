!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/main.css">
</head>
<style>
    /* * { outline: 1px #f00 solid; } */

    .navbar-nav {
        float: right;
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
    <div class="navbar navbar-default navbar-turquoise navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                  <img class="brand-image" src="../../images/HC-NETWORK-LOGO-resized.png">
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
                    <li><a href="#">Home</a></li>
                    <li><a href="/M5project/public/modules/user/profile.php">Profile</a></li>
                    <li><a href="#">Message</a></li>
                    <li><a href="/M5project/public/modules/user/register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </div>

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  background: white;
  width: 300px;
  margin: auto;
  margin-bottom: 100px;
  float:left;
  text-align: center;
  font-family: arial;
}
h2 {
    font-size: 40px;
    font-family: arial;
    margin-top: 50px;
    margin-bottom: 10px;
    color: red;
  }

.card img {
  width: 300px;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 14px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
h1 {font-size: 16px;
}

</style>
</head>
<body>

<h2 style="text-align:center"><strong>Visit our Users Profile</strong></h2>

<div class="card">
  <img src="../../images/Jeremy Wong.jpg" alt="Jeremy" style="width:100%">
  <h1>Jeremy Wong</h1>
  <p class="title">Marketing Manager</p>
  <p>Harvard University</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
  <p><a href="updateprofile.php">Connect</a></p>
  </div>
  
 <div class="card">
  <img src="../../images/Henna Chen.jpg" alt="Henna" style="width:100%">
  <h1>Henna Chen</h1>
  <p class="title">CEO</p>
  <p>NUS Singapore</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
  <p><a href="updateprofile.php">Connect</a></p>
  </div>
  
   <div class="card">
  <img src="../../images/Grace Wong.jpg" alt="Grace" style="width:100%">
  <h1>Grace Wong</h1>
  <p class="title">Associative Creative Director</p>
  <p>NTU University</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
  <p><a href="updateprofile.php">Connect</a></p>
  </div>
  
     <div class="card">
  <img src="../../images/John Long.jpg" alt="John" style="width:100%">
  <h1>John Long</h1>
  <p class="title">Project Manager</p>
  <p>Harvard University</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
  <p><a href="updateprofile.php">Connect</a></p>
  </div>
  
       <div class="card">
  <img src="../../images/Mary Ng.jpg" alt="Mary" style="width:100%">
  <h1>Mary Ng</h1>
  <p class="title">Graphic Designer</p>
  <p>SIM University</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
  <p><a href="updateprofile.php">Connect</a></p>
  </div>
  
       <div class="card">
  <img src="../../images/Jimmy Tan.jpg" alt="Jimmy" style="width:100%">
  <h1>Jimmy Tan</h1>
  <p class="title">Photography</p>
  <p>Nafa Instituition</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
  <p><a href="updateprofile.php">Connect</a></p>
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
                    <li><a href="">Terms of Use</a></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>


</body>
</html>
