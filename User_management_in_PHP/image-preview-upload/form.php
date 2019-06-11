<?php  include_once('processForm.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
	<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.css"
		href = "bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/main.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-4 offset-md-4 form-div">
				<a href="profiles.php">View</a>
				<form action="form.php" method="POST" enctype="multipart/form-data">
					<h2 class="text-center">Update Profile</h2>
					<?php if (!empty($msg)): ?>
					<div class="alert <?php echo $msg_class ?>" role="alert">
						<?php echo $msg; ?>
					</div>
				<?php endif; ?>
				<div class="form-group text-center" style="position: relative;">
					<span class="img-div">
					<div class="text-center img-placeholder" onclick="triggerClick()">
					<h4>Update Image</h4>
					</div>
					<img src="images/avatar.jpg" onclick="triggerClick()" id="profileDisplay"> 
					</span>
					<input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
					<label>Profile Image</label>
				</div>
				<div class="form-group">
					<label>Bio:</label>
					<textarea name="bio" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" name="save_profile" class="btn btn-primary btn-block">Save User</button>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<script src="bootstrap-3.3.7-dist/js/scripts.js" type="text/javascript" ></script>