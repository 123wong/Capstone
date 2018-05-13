<?php

session_start();
session_destroy();
echo "Logout";
header("Location:/M5project/public/
	login.php");
?>