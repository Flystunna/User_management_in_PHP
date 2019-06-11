<!DOCTYPE html>
<html>
<head>
	<title>Login form</title>
	<!-- Using external stylesheet to make the registration form look attractive -->
<script src="bootstrap-3.3.7-dist/js/jquery-3.1.0.min.js" type="text/javascript"></script>
 	   <script src="bootstrap-3.3.7-dist/js/bootstrap.js" type="text/javascript"></script>
<!-- Javascript validation for user inputs -->
<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
<script type="text/javascript">
function validate()
{
var username = document.login.username.value;
var password = document.login.password.value;
if (username==null || username=="")
{
alert("Username can't be blank");
return false;
}
else if (password==null || password=="")
{
alert("password can't be blank");
return false;
}
}

$(document).ready(function() {
	$("#flash_msg").delay(30).fadeOut("slow");
});
</script>
<style>

body{
	background-image: url("left1.jpg");
}
</style> 
</head>
<body>
	<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-info">
      <div class="container">
        <a href="../" class="navbar-brand">Pablo Inc.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">About</a>
            </li>
          </ul>

          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php" target="_blank">Contact Us</a>
            </li>
          </ul>

        </div>
      </div>
    </div>
    <br/><br/><br/><br/>
	<div class="container" >
	<div class="login-box">
	<div class="row">
	<div class="col-md-6" style="background-color: rgb(192,192,192); border-radius: 25px">
		<?php 
 include_once("dbconnection.php"); 
 session_start(); //always start a session in the beginning 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 
 if (empty($_POST['username']) || empty($_POST['password'])) //Validating inputs using PHP code 
 { 
 echo  "Incorrect username or password"; //
 header("location: loginform.php");//You will be sent to Login.php for re-login 
 } 
 
 $inUsername = $_POST["username"]; // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[] 
 $inPassword = $_POST["password"]; 
 $stmt= $db->prepare("SELECT USERNAME, PASSWORD FROM PROFILE WHERE USERNAME = ?"); //Fetching all the records with input credentials
 $stmt->bind_param("s", $inUsername); //bind_param() - Binds variables to a prepared statement as parameters. "s" indicates the type of the parameter.
 $stmt->execute();
 $stmt->bind_result($UsernameDB, $PasswordDB); // Binding i.e. mapping database results to new variables

   
 //Compare if the database has username and password entered by the user. Password has to be decrypted while comparing.
 if ($stmt->fetch() && password_verify($inPassword, $PasswordDB)) 
 {
 $_SESSION['username']=$inUsername; //Storing the username value in session variable so that it can be retrieved on other pages
 header("location: userprofile.php"); // user will be taken to profile page
 }
 else
 {
    echo '<label>Incorrect username or password</label>'; 
   ?>
       <?php 
 } 
 } 
   ?>
<br>
<form name="login" method="post" action="loginform.php" onsubmit="return validate();" >
<h2> Login</h2>
	<div class = "form-group">
	 <label>Username:</label>
	 <input type="text" name="username" placeholder=" Enter Username"  class="form-control" required>
	</div>
	<div class="form-group">
	<label> Password:</label>
	<input type="password" name="password" class="form-control" placeholder=" Enter Password" required>
	</div>
	<button type="submit" value="Login" class= "btn btn-primary"> Login </button>
	<p></p>
	<button type="submit" value="register" onclick="window.location ='registerform.php' " class= "btn btn-success"> Register </button> Don't have an account? 
	<p></p>
	</form>
</form>
</div>
</div>
  </div>
    </div>
</body>
</html>
