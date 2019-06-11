<?php 
mysql_connect("localhost", "dara", "1234") or die(mysql_error());
mysql_select_db("profile") or die(mysql_error());

$output='';
//collect
if(isset($_POST['search'])){
	$searchq = $_POST['search'];
	$searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

	$query = mysql_query("SELECT * FROM data WHERE id LIKE  '%$searchq%' ") or  die(mysql_error());
	$count = mysql_num_rows($query);
	if ($count == 0){
		$output = 'There was no search results';
	} else {
		while ($row = mysql_fetch_array($query)) {
			$id = $row['id'];
			$name = $row['name'];
			$services = $row['services'];

			$output = '<div> '.$name.' '.$services.' </div>';
		}

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
		<style>

body{
	background-image: url("left1.jpg");
}
</style> 
</head>
<body>

	<form action="search.php" method="post">
		<input type="text" name="search" placeholder="Enter ID">
		<input type="submit" name="submit" value=">>">
	</form>
	<?php print("$output"); ?>

</body>
</html>