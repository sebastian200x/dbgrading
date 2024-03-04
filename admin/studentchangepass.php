<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>

<body>

	<form method="post" action="#">
		<div class="container p-3 my-3 border">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="studentCRUD2.php">Edit Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Change Password</a>
      </li>
    </ul>
		<div class="vh-100 d-flex justify-content-center" style="margin: 5% 0 0 0;">
			<div class="col-md-5 p-3 shadow-sm border border-primary bg-white">
				<div class="text">
					<h3 class="card-title text-center">Change Password</h3>
					<div class="mb-1">
						<label for="oldpass" class="form-label">Old Password:</label>
						<input type="password" name="oldpass" class="form-control border border-primary" id="oldpass" aria-describedby="emailHelp" placeholder="Old Password" autocomplete="off" required>
					</div>
					<div class="mb-1">
						<label for="newpass" class="form-label">New Password:</label>
						<input type="password" name="newpass" class="form-control border border-primary" id="newpass" aria-describedby="emailHelp" placeholder="New Password" autocomplete="off" required>
					</div>
					<div class="mb-3">
						<label for="newpass2" class="form-label">Retype New Password:</label>
						<input type="password" name="newpass2" class="form-control border border-primary" id="newpass2" required placeholder="Retype New Password" autocomplete="off" minlength="8">
					</div>

					<button class="btn btn-primary" type="submit" name="changepass">Update Password</button>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

					</div>
				</div>
			</div>
		</form>
	</body>
	</html>
