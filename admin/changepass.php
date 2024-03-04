<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
<body>
	<form method="post">
		<div class="container p-3 my-3 border">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link" href="studenteditinfo.php">Edit Information</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#">Change Password</a>
				</li>
			</ul>
			<?php
			if (isset($_POST['changepass'])){
				$StudentID = $_SESSION['stdid'];
				$result = mysqli_query($db, "SELECT StdPass FROM tblstd WHERE tblstd.StdID = $StudentID");
				$fetch = mysqli_fetch_assoc($result);
				if ($_POST['newpass'] == $_POST['newpass2']){
					$hashpassword = password_hash($_POST['newpass2'], PASSWORD_DEFAULT);
					$changepass = mysqli_query($db, "UPDATE tblstd SET StdPass = '$hashpassword' WHERE tblstd.StdID = '$StudentID'");
					?>
					<script type="text/javascript">
						window.alert("Update Successfully!");
					</script> 
					<?php
				}
				else{
					?>
					<div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="margin: 1% 30% -4% 30%;">
						<strong>New Password is not the same.<br></strong> You should check in on some of those fields.
						<a class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </a>
					</div>
					<?php
				}
			}
			?>
			<div class="vh-100 d-flex justify-content-center" style="margin: 4% 0 4% 0;">
				<div class="col-md-5 bg-white">
					<div class="text">
						<h3 class="card-title text-center">Change Password</h3>
						<div class="mb-1">
							<label for="newpass" class="form-label">New Password:</label>
							<input type="password" name="newpass" class="form-control border border-primary" id="newpass" aria-describedby="emailHelp" placeholder="New Password" autocomplete="off" required title="Remember: This is the New Password">
						</div>
						<div class="mb-3">
							<label for="newpass2" class="form-label">Retype New Password:</label>
							<input type="password" name="newpass2" class="form-control border border-primary" id="newpass2" required placeholder="Retype New Password" autocomplete="off" minlength="8" title="Please Retype New Password">
						</div>

						<button class="btn btn-primary" type="submit" name="changepass">Update Password</button>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

						</div>
					</div>
				</div>
			</form>
		</body>
		</html><?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
<body>
	<form method="post">
		<div class="container p-3 my-3 border">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link" href="studenteditinfo.php">Edit Information</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#">Change Password</a>
				</li>
			</ul>
			<?php
			if (isset($_POST['changepass'])){
				$StudentID = $_SESSION['stdid'];
				$result = mysqli_query($db, "SELECT StdPass FROM tblstd WHERE tblstd.StdID = $StudentID");
				$fetch = mysqli_fetch_assoc($result);
				if ($_POST['newpass'] == $_POST['newpass2']){
					$hashpassword = password_hash($_POST['newpass2'], PASSWORD_DEFAULT);
					$changepass = mysqli_query($db, "UPDATE tblstd SET StdPass = '$hashpassword' WHERE tblstd.StdID = '$StudentID'");
					?>
					<script type="text/javascript">
						window.alert("Update Successfully!");
					</script> 
					<?php
				}
				else{
					?>
					<div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="margin: 1% 30% -4% 30%;">
						<strong>New Password is not the same.<br></strong> You should check in on some of those fields.
						<a class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </a>
					</div>
					<?php
				}
			}
			?>
			<div class="vh-100 d-flex justify-content-center" style="margin: 4% 0 4% 0;">
				<div class="col-md-5 bg-white">
					<div class="text">
						<h3 class="card-title text-center">Change Password</h3>
						<div class="mb-1">
							<label for="newpass" class="form-label">New Password:</label>
							<input type="password" name="newpass" class="form-control border border-primary" id="newpass" aria-describedby="emailHelp" placeholder="New Password" autocomplete="off" required title="Remember: This is the New Password">
						</div>
						<div class="mb-3">
							<label for="newpass2" class="form-label">Retype New Password:</label>
							<input type="password" name="newpass2" class="form-control border border-primary" id="newpass2" required placeholder="Retype New Password" autocomplete="off" minlength="8" title="Please Retype New Password">
						</div>

						<button class="btn btn-primary" type="submit" name="changepass">Update Password</button>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

						</div>
					</div>
				</div>
			</form>
		</body>
		</html><?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
<body>
	<form method="post">
		<div class="container p-3 my-3 border">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link" href="studenteditinfo.php">Edit Information</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#">Change Password</a>
				</li>
			</ul>
			<?php
			if (isset($_POST['changepass'])){
				$StudentID = $_SESSION['stdid'];
				$result = mysqli_query($db, "SELECT StdPass FROM tblstd WHERE tblstd.StdID = $StudentID");
				$fetch = mysqli_fetch_assoc($result);
				if ($_POST['newpass'] == $_POST['newpass2']){
					$hashpassword = password_hash($_POST['newpass2'], PASSWORD_DEFAULT);
					$changepass = mysqli_query($db, "UPDATE tblstd SET StdPass = '$hashpassword' WHERE tblstd.StdID = '$StudentID'");
					?>
					<script type="text/javascript">
						window.alert("Update Successfully!");
					</script> 
					<?php
				}
				else{
					?>
					<div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="margin: 1% 30% -4% 30%;">
						<strong>New Password is not the same.<br></strong> You should check in on some of those fields.
						<a class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </a>
					</div>
					<?php
				}
			}
			?>
			<div class="vh-100 d-flex justify-content-center" style="margin: 4% 0 4% 0;">
				<div class="col-md-5 bg-white">
					<div class="text">
						<h3 class="card-title text-center">Change Password</h3>
						<div class="mb-1">
							<label for="newpass" class="form-label">New Password:</label>
							<input type="password" name="newpass" class="form-control border border-primary" id="newpass" aria-describedby="emailHelp" placeholder="New Password" autocomplete="off" required title="Remember: This is the New Password">
						</div>
						<div class="mb-3">
							<label for="newpass2" class="form-label">Retype New Password:</label>
							<input type="password" name="newpass2" class="form-control border border-primary" id="newpass2" required placeholder="Retype New Password" autocomplete="off" minlength="8" title="Please Retype New Password">
						</div>

						<button class="btn btn-primary" type="submit" name="changepass">Update Password</button>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

						</div>
					</div>
				</div>
			</form>
		</body>
		</html>