<?php
session_start();

$mysqli = new mysqli('localhost', 'dara', '1234', 'profile') or die (mysql_error($mysqli));
$id = 0;
$name='';
$update=false;
$services='';
if (isset($_POST['save'])){
	$name = $_POST['name'];
	$services = $_POST['services'];

	$_SESSION['message'] = "Record has been saved";
	$_SESSION['msg_type'] ="success";

	header("location: index.php");

	$mysqli->query("INSERT INTO data(name, services) VALUES ('$name', '$services')") or 
	die ($mysqli->error);
}
if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted";
	$_SESSION['msg_type'] ="danger";

	header("location: index.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true; 
	$result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
	if (count($result)==1){
		$row = $result->fetch_array();
		$name = $row['name'];
		$services = $row['services'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$services = $_POST['services'];

	$mysqli->query("UPDATE data SET name='$name', services='$services' WHERE id = $id") or die($mysqli->error);

	$_SESSION['message'] = "Record has been updated";
	$_SESSION['msg_type'] = "warning";

	header('location: index.php');
	
}