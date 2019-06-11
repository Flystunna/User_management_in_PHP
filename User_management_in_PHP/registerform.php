<!DOCTYPE html>
<html>
<head>
	<title>RegisterForm.php</title>
	<!-- Using external stylesheet to make the registration form look attractive -->
	<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.min.css">
<!-- Javascript validation for user inputs -->
<style>

body{
	background-image: url("left1.jpg");
}
</style> 
</head>
<body>
<div class="container">
<div class="login-box">
<div class="row">
	<div class="col-md-6" style="background-color: rgb(192,192,192); border-radius: 25px">
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
echo '<label>Oops. Something went wrong. Username or Email already exists.Please try again </label>'; 
?>
<?php 
}
}
?>
		<br/>
	<h2> Register</h2>
	<form name="register" action="registerform.php" onsubmit="return validate();" method="post">
	<div class = "form-group">
		 <label>Name:</label>
		 <input type="text" name="fullname" placeholder="Enter Full Name" class="form-control" required>
		</div>
		<div class = "form-group">
		 <label>Username:</label>
		 <input type="text" name="username" class="form-control" placeholder="Enter Username"  required>
		</div>
		<div class="form-group">
		<label>Password:</label>
		<input type="password" name="password" class="form-control" placeholder="Enter Password"  required>
		</div>
		<div class="form-group">
		<label>Select State:</label>
		<select name="location" id="location" class="form-control" required>
			<option></option>
 			<option value="Abia">Abia</option>
			<option value="Adamawa">Adamawa</option>
			<option value="Akwa Ibom">Akwa Ibom</option>
			<option value="Anambra">Anambra</option>
			<option value="Bauchi">Bauchi</option>
			<option value="Bayelsa">Bayelsa</option>
			<option value="Benue">Benue</option>
			<option value="Cross River">Cross River</option>
			<option value="Delta">Delta</option>
			<option value="Ebonyi">Ebonyi</option>
			<option value="Enugu">Enugu</option>
			<option value="Edo">Edo</option>
			<option value="Ekiti">Ekiti</option>
			<option value="Gombe">Gombe</option>
			<option value="Imo">Imo</option>
			<option value="Jigawa">Jigawa</option>
			<option value="Kaduna">Kaduna</option>
			<option value="Kano">Kano</option>
			<option value="Katsina">Katsina</option>
			<option value="Kebbi">Kebbi</option>
			<option value="Kogi">Kogi</option>
			<option value="Kwara">Kwara</option>
			<option value="Lagos">Lagos</option>
			<option value="Nassarawa">Nassarawa</option>
			<option value="Niger">Niger</option>
			<option value="Ogun">Ogun</option>
			<option value="Ondo">Ondo</option>
			<option value="Osun">Osun</option>
			<option value="Oyo">Oyo</option>
			<option value="Plateau">Plateau</option>
			<option value="Rivers">Rivers</option>
			<option value="Sokoto">Sokoto</option>
			<option value="Taraba">Taraba</option>
			<option value="Yobe">Yobe</option>
			<option value="Zamfara">Zamfara</option>
			<option value="FCT">FCT</option>
		</select>
		</div>
		<div class="form-group">
		<label>Email:</label>
		<input type="email" name="email" class="form-control" placeholder="Enter A Valid Email Address"  required>
		</div>
		<div class="form-group">
		<label>Gender:</label>
		<select name="gender" id="gender" class="form-control" required>
		<option></option>
		<option value="Female">Female</option>
		<option value="Male">Male</option>
		</select>
		</div>
		<button type="submit" value="Register" class= "btn btn-success"> Register </button>
		<p></p>
	<button type="submit" value="login" onclick="window.location ='loginform.php' " class= "btn btn-primary"> Login </button> Already have an account? 
		<p></p>

		</form>
	</div>
	</div>
	</div>
</div>
</body>
</html>
