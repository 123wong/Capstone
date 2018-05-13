<?php
ob_start();
require_once 'includes/autoload.php';
include 'includes/header.php';
?>

   
<style>

body{
  background-color: #D6EAF8;
}

.background{
  background-color: #DCDCDC;

}

.personal-profile {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  background: white;

  width: 300px;
  margin: auto;

  float:center;
  text-align: center;
  font-family: arial;

}

h6 {
    font-size: 40px;
    font-family: arial;
    margin-top: 100px;
    margin-bottom: 20px;
    color: red;
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
  font-size: 24px;
}

a {
  text-decoration: none;
  font-size: 24px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

h1 {font-size: 24px;
}

p {font-size: 20px;
}

h2{
  padding-bottom: 15px;
}

</style>

</head>
<body>


<h6 style="text-align:center"><italic>My Profile</italic></h6>

<table style="width: 80%; align: center;">
<div class="personal-profile">
  <img src="images/Jeremy Wong.jpg" alt="Jeremy" style="width:100%">
  <h1>Jeremy Wong</h1>
  <p class="title"><i>Marketing Manager</i></p>
  <p>Harvard University</p>

  <h2><a href="updateprofile.php">Edit</a></h2>

  

</body>

