<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
 	<script src="bootstrap-3.3.7-dist/js/jquery-3.1.0.min.js" type="text/javascript"></script>
 	   <script src="bootstrap-3.3.7-dist/js/bootstrap.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
</head>
<body>
	<?php
session_start();
$username = $_SESSION['username']; //retrieve the session variable
?>
<?php
if(!isset($_SESSION['username'])) //If user is not logged in then he cannot access the profile page
{
//echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
header("location:loginform.php");
}
?>
<br/><br/>
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
<div class="container-fluid">
<div class="row">
<div class="col-lg-4">
<div class="form-group">
<div class="card bg-light mb-3" style="text-align: center; max-width: 18rem;" >
	<img src="blank.png" class="card-img-top" >
	<h1> Welcome <?php echo $username ?> </h1>
	<p><a href="userprofile.php"><i class="fas fa-address-book"></i></a> 
	<a href="userprofile.php"><i class="fab fa-facebook-f"></i></a>
	<a href="userprofile.php"><i class="fab fa-linkedin"></i></a></p>
	<br/>
</div>
<a href="logout.php" class="btn btn-info">Logout</a>
</div>
<div><a href="index.php">Master</a></div>
</div>
</div>
</div>
</body>
</html>

