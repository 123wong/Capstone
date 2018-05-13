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



<body>

    <form action="userlist1.php" method="post">
        <input type="text" name="search" placeholder="Search for member..."
        input type="submit" value=">>"
    </form>

</body>

    <?php print ("$output");
    ?>