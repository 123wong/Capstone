<?php
mysql_connect("localhost","root","Abcd1234") or die ("could not connect");
mysql_select_db ("search_test") or die ("could not find db");
$output = '';
//collect
if (isset($_POST['search'])){
	$searchq = $_POST['search'];
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

	$query = mysql_query("SELECT *  FROM `cp_tb_user` WHERE UserName LIKE'%$searchq%' OR UserAddress LIKE '%$searchq%'") or die ("could not search");
	$count = mysql_num_rows ($query);
	if (count == 0){
		$output = 'There was no search results!';
	}else {
		while ($row = mysql_fetch_array ($query)) {
			$UserName = $row ['UserName'];
			$UserAddress = $row ['UserAddress'];
			$UserId = $row ['UserId'];

			$output = '<div>'.$UserName.''.$UserAddress.'</div>';

}
	}
		}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<form action="Search.php" method="post">
		<input type="text" name="search" placeholder="Search for member..."
		input type="submit" value=">>"
	</form>

	<?php print ("$output");
	?>

</body>
</html>