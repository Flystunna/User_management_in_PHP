<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>
	<!-- Using external stylesheet to make the registration form look attractive -->
<link rel = "stylesheet"  href="bootstrap-3.3.7-dist/js/jquery.min.js"/>

<!-- Javascript validation for user inputs -->
<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
</head>
<body>
	<?php require_once 'process.php'; ?>

	<?php 

	if (isset($_SESSION['message'])):
	?>
	<div class="alert alert-<?=$_SESSION['msg_type']?>">

		<?php

		echo $_SESSION['message'];
		unset($_SESSION['message']);

		?>
	</div>
<?php endif ?>
	<div class="container">
	<?php
$mysqli = new mysqli('localhost', 'dara', '1234', 'profile') or die (mysqli_error($mysqli));

$result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
?>
<div class="row justify-content-center">
	<table class="table table-bordered table-hover "  >
		<thead>
			<tr>
				<th>Name</th>
				  <th>Location</th>
				    <th colspan="2">Action </th>
			</tr>
		</thead>
		<?php
		while ($row = $result->fetch_assoc()):?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['services']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
				<a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>
<?php
if(!isset($_SESSION['username'])) //If user is not logged in then he cannot access the profile page
{
//echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
header("location:loginform.php");
}
?>
<?php
function pre_r($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}?>
	<div class="row justify-content-center">
	<form action="process.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="form-group">
		<label>Name:</label>
		<input type="text" value="<?php echo $name; ?>" class="form-control" name="name" placeholder="Enter your name">
	</div>
	<div class="form-group">
		<label>Area of Specialization:</label>
		<input type="text" value="<?php echo $services; ?>" class="form-control" name="services" placeholder="Area Of Specialization">
	</div>
	<div class="form-group">
		<?php
		if ($update == true): 
		?>
		<button type="submit" class="btn btn-info" name="update">Update</button>
		<?php else: ?>
		<button type="submit" class="btn btn-primary" name="save" > Save</button>
	<?php endif; ?>
	</div>
	</form>
</div>
</div>
</body>
</html>