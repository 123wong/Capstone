<?php

//session_start();
include 'includes/security.php';
include 'includes/header.php';
use classes\business\UserManager;
require_once 'includes/autoload.php';
?>


<h2><b>Search for Users</b></h2>

     <form action="searchuser.php" method="post">
	 <table border='0' >
	 <col width="60">
	 <col width="80">
	 
	 <tr> 
	 
	<td > Search: </td>
		<td>
		<input type="text" name="term" placeholder="Enter Last name" size="30">
		</td>
	 
		<td>
			<input type="submit" name="submit" value="Submit" class="pure-button pure-button-primary">
		</td>
		
	</tr>
	</table>
    </form>
	 
<?php

if(isset($_POST["term"]))
{
	if($_POST["term"]!=NULL)
	{
		$lastname=$_POST["term"];
		$UM=new UserManager();
		$users=$UM->searchName($UserName);
	}

}
if(isset($users)){
    ?>
	
    <br/><br/>Below is the list of Developers registered in community portal <br/><br/>
    <table class="pure-table pure-table-bordered" width="800">
	<col width="40">
	<col width="120">
	<col width="120">
	<col width="80">
	
	<tr>
	<thead>
    <th align="left">Name</th>
    <th align="left">Address</th>
	<th align="left">Email</th>
    <th align="left">Password</th>
	</thead>
	</tr>
	            
    <?php 
    foreach ($users as $user) {
        if($user!=null){
            ?>
            <tr>
               <td><?=$user->UserName?></td>
               <td><?=$user->UserAddress?></td>
               <td><?=$user->UserEmail?></td>
               <td><?=$user->UserPassword?></td>
            </tr>
            <?php 
        }
    }
}
    ?>
    </table><br/><br/>
	  
</body>

