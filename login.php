<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
</head>

<body>
	<?php
	if (isset($_POST['login'])) {
		if ($_POST['usertype'] == 'Student') {
			$stduser = mysqli_query($db, "SELECT DISTINCT StdUser FROM tblstd WHERE tblstd.StdUser = '" . $_POST['username'] . "'");
			if (mysqli_num_rows($stduser) <> 0) {
				$stdpass = mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT StdPass FROM tblstd  WHERE tblstd.StdUser = '" . $_POST['username'] . "'"));
				if (password_verify($_POST['password'], $stdpass['StdPass'])) {
					$reg = mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT StdReg FROM tblstd WHERE tblstd.StdUser = '" . $_POST['username'] . "'"));
					if ($reg['StdReg'] <> 0) {
						$StdID = mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT StdID FROM tblstd WHERE tblstd.StdUser = '" . $_POST['username'] . "'"));
						$_SESSION['StudentID'] = $StdID['StdID'];
						?>
						<script type="text/javascript">
							window.location = "student/grades.php";
						</script>
						<?php
					} else {
						?>
						<div class="alert alert-warning alert-dismissible fade show text-center" role="alert"
							style="margin: 2% 30% -4% 30%;">
							<strong>Account Registered</strong><br> Please wait for the Student Enrollment
							<a class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </a>
						</div>
						<?php
					}
				} else {
					?>
					<div class="alert alert-danger alert-dismissible fade show text-center" role="alert"
						style="margin: 2% 30% -4% 30%;">
						<strong>Incorrect Password</strong><br> You should check in on some of those fields below.
						<a class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </a>
					</div>
					<?php
				}
			} else {
				?>
				<div class="alert alert-danger alert-dismissible fade show text-center" role="alert"
					style="margin: 2% 30% -4% 30%;">
					<strong>Username Not Found</strong><br> You should check in on some of those fields below.
					<a class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </a>
				</div>
				<?php
			}

		} else if ($_POST['usertype'] == 'Professor') {
			$profuser = mysqli_query($db, "SELECT DISTINCT ProfUser FROM tblprof WHERE tblprof.ProfUser = '" . $_POST['username'] . "'");
			if (mysqli_num_rows($profuser) <> 0) {
				$profpass = mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT ProfPass FROM tblprof WHERE tblprof.ProfUser = '" . $_POST['username'] . "'"));
				if (password_verify($_POST['password'], $profpass['ProfPass'])) {
					$profid = mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT ProfID FROM tblprof WHERE tblprof.ProfUser = '" . $_POST['username'] . "'"));
					$_SESSION['ProfID'] = $profid['ProfID'];
					?>
						<script type="text/javascript">
							window.location = "prof/sectionlist.php";
						</script>
					<?php
				} else {
					?>
						<div class="alert alert-danger alert-dismissible fade show text-center" role="alert"
							style="margin: 2% 30% -4% 30%;">
							<strong>Incorrect Password</strong><br> You should check in on some of those fields below.
							<a class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </a>
						</div>
					<?php
				}
			} else {
				?>
					<div class="alert alert-danger alert-dismissible fade show text-center" role="alert"
						style="margin: 2% 30% -4% 30%;">
						<strong>Username Not Found</strong><br> You should check in on some of those fields below.
						<a class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </a>
					</div>
				<?php
			}
		} else if ($_POST['usertype'] == 'Admin') {
			$adminuser = mysqli_query($db, "SELECT DISTINCT AdminUser FROM tbladmin WHERE tbladmin.AdminUser = '" . $_POST['username'] . "'");
			if (mysqli_num_rows($adminuser) <> 0) {
				$adminpass = mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT AdminPass FROM tbladmin WHERE tbladmin.AdminUser = '" . $_POST['username'] . "'"));
				if (password_verify($_POST['password'], $adminpass['AdminPass'])) {
					$adminid = mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT AdminID FROM tbladmin WHERE tbladmin.AdminUser = '" . $_POST['username'] . "'"));
					$_SESSION['AdminID'] = $adminid['AdminID'];
					?>
							<script type="text/javascript">
								window.location = "admin/index.php";
							</script>
					<?php
				} else {
					?>
							<div class="alert alert-danger alert-dismissible fade show text-center" role="alert"
								style="margin: 2% 30% -4% 30%;">
								<strong>Incorrect Password</strong><br> You should check in on some of those fields below.
								<a class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </a>
							</div>
					<?php
				}
			} else {
				?>
						<div class="alert alert-danger alert-dismissible fade show text-center" role="alert"
							style="margin: 2% 30% -4% 30%;">
							<strong>Username Not Found</strong><br> You should check in on some of those fields below.
							<a class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </a>
						</div>
				<?php
			}
		}
	}
	?>
	<form method="post">
		<div class="d-flex justify-content-center align-items-center" style="margin: 5% 0 0 0;">
			<div class="col-md-5 p-3 shadow-sm border border-primary bg-white">
				<div class="text-center">
					<h2 class="text-center mb-4 text-primary">Login</h2>
					<label for="usertype" class="form-label">User Type:</label>
					<select class="form-select form-select-sm" required name="usertype" id="usertype">
						<option disabled selected hidden value="">Please select the user type</option>
						<option value="Student">Student</option>
						<option value="Professor">Professor</option>
						<option value="Admin">Admin</option>
					</select>
					<div class="mb-1">
						<label for="exampleInputEmail1" class="form-label">Username</label>
						<input type="text" name="username" class="form-control border border-primary"
							id="exampleInputEmail1" aria-describedby="emailHelp"
							placeholder="Username or Student Number" autocomplete="off" required>
					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Password</label>
						<input type="password" name="password" class="form-control border border-primary"
							id="exampleInputPassword1" required="true" placeholder="Password" autocomplete="off"
							minlength="8">
					</div>
					<button class="btn btn-primary" type="submit" name="login">Login</button>
				</div>
				<a href="register/account.php">Register as student</a>
			</div>
		</div>
</body>
</form>
</div>

</html>