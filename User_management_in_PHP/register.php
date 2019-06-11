<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<?php
include("dbconnection.php"); // include the connection object from the DBConnection.php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
$inFullname = $_POST["fullname"]; // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[]
$inEmail = $_POST["email"];
$inUsername = $_POST["username"];
$inPassword = $_POST["password"];
$inLocation = $_POST["location"];
$inGender = $_POST["gender"];
$encryptPassword = password_hash($inPassword, PASSWORD_DEFAULT);
$stmt = $db->prepare("INSERT INTO PROFILE(FULLNAME, EMAIL, USERNAME, PASSWORD, LOCATION, GENDER) VALUES(?, ?, ?, ?,?,?)"); //Fetching all the records with input credentials
$stmt->bind_param("ssssss", $inFullname, $inEmail, $inUsername, $encryptPassword, $inLocation, $inGender); //Where s indicates string type. You can use i-integer, d-double
$stmt->execute();
$result = $stmt->affected_rows;
$stmt -> close();
$db -> close(); 
if($result > 0)
{
header("location: regsuccess.php"); // user will be taken to the success page
}
else
{
echo "Oops. Something went wrong. Please try again"; 
?>
<a href="registerform.php">Try Login</a>
<?php 
}
}
?>

</body>
</html>