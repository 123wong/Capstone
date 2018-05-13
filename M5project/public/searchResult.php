<?php
include 'includes/security.php';
include 'includes/header.php';
include_once '../classes/business/UserManager.php';
include_once '../classes/data/UserManagerDB.php'; 
include_once '../classes/util/Config.php';
include_once '../classes/util/DBUtil.php';
include_once '../classes/entity/User.php';

use classes\business\UserManager;

if (isset($_POST['submitForm'])){
	$search = $_POST['search'];
	$UM = new UserManager();
	$searchResult = $UM ->searchUser($search);	
}
?>
<br>
<br>
<h1>Search results</h1>
<table class="table table-striped">
		<thead>
			<th>
				Name
			</th>
			<th>
				Email
			</th>
		</thead>
	
<?php
echo "<br>";
if($searchResult){
	for ($i=1; $i<count($searchResult); $i++){
?>
	<tr>
		<td>
			<?=$searchResult[$i]->userName?>
		</td>
		<td>
			<?=$searchResult[$i]->userEmail?>
		</td>
	</tr>
<?php
}} else {
	echo "<p>No result found!</p>";
}
?>
</table>