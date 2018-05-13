<?php
ob_start();
include 'includes/security.php';
include 'includes/header.php';
use classes\business\UserManager;
require_once 'includes/autoload.php';

if (isset($_POST['submitForm'])){
  $search = $_POST['search'];
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";

  echo "<h1>{$search}</h1>";

}


/*
  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
  if(preg_match("/^[  a-zA-Z]+/", $_POST['UserName'])){
  $UserName=$_POST['UserName'];
  //connect  to the database
  $db=mysql_connect  ("UserId", "UserName",  "UserEmail") or die ('I cannot connect to the database  because: ' . mysql_error());
  //-select  the database to use
  $mydb=mysql_select_db("yourDatabase");
  //-query  the database table
  $sql="SELECT  UserId, UserName, UserEmail FROM Contacts WHERE UserName LIKE '%" . $UserName .  "%' OR UserEmail LIKE '%" . $UserEmail ."%'";
  //-run  the query against the mysql query function
  $result=mysql_query($sql);
  //-create  while loop and loop through result set
  while($row=mysql_fetch_array($result)){
          $UserName=$row['UserName'];
          $UserEmail=$row['UserEmail'];
          $UserId=$row['UserId'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li>" . "<a  href=\"search2.php?UserId=$UserId\">"   .$UserName . " " . $UserPassword .  "</a></li>\n";
  echo "</ul>";
  }
  }
  else{
  echo  "<p>Please enter a search query</p>";
  }
  }
  }*/
?>
<head>
    <title>Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

 




<br>
<br>
<!-- <h1>HEAD</h1>


 
<div class="collapse navbar-collapse" id="myNavbar">
      <form class="navbar-form navbar-right" method='post' name='search'>
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search" name="search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit" name='submitForm'>
             <i class="glyphicon glyphicon-search"></i>
            </button>
        </form>
</div> -->


<!-- <form class="navbar-form navbar-right">
          <div class="form-group input-group">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form> -->


</body>
</html>

