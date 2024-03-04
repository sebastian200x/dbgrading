<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Account Registration</title>
</head>
<body>
	<div class="container p-5 my-5 border">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<p class="nav-link">Account Registration</p>
			</li>
			<li class="nav-item">
				<p class="nav-link active text-primary">Information Registration</p>
			</li>
			<li class="nav-item">
				<p class="nav-link">Academic Registration</p>
			</li>
		</ul>
		<form method="post">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-2 text-primary">Information</h6>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
						<div class="form-group">
							<label for="fname">First Name</label>
							<input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" required>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
						<div class="form-group">
							<label for="mname">Middle Name</label>
							<input type="text" class="form-control" id="mname" placeholder="Middle Name" name="mname" required>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
						<div class="form-group">
							<label for="lname">Last Name</label>
							<input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" required>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

						<div class="form-group">
							<label for="datetimepicker1">Date of Birth</label>
							<input type="date" class="form-control" id="datetimepicker1" placeholder="Birthday" name="bday" required>
						</div>

					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
						<label for="gender">Gender</label>
						<select class="form-control" id="gender" name="gender" required>
							<option disabled selected hidden value="">Please select the user type</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
						<div class="form-group">
							<label for="civil">Civil Status</label>
							<input type="text" class="form-control" id="civil" placeholder="Civil Status" name="status" required>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-2 text-primary">Address</h6>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
						<div class="form-group">
							<label for="StdHNo">House No.</label>
							<input type="text" class="form-control" id="StdHNo" placeholder="House Number" name="StdHNo" required>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
						<div class="form-group">
							<label for="StdStreet">Street</label>
							<input type="text" class="form-control" id="ciTy" placeholder="Street" name="StdStreet" required>
						</div>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
						<div class="form-group">
							<label for="StdBarangay">Barangay</label>
							<input type="text" class="form-control" id="StdBarangay" placeholder="Barangay" name="StdBarangay" required>
						</div>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
						<div class="form-group">
							<label for="StdCity">City</label>
							<input type="text" class="form-control" id="StdCity" placeholder="City" name="StdCity" required>
						</div>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
						<div class="form-group">
							<label for="StdZip">Zip Code</label>
							<input type="number" class="form-control" id="StdZip" placeholder="Zip Code" name="StdZip" required maxlength="4">
						</div>
					</div>
				</div>
				<div class="text-center">
					<div class="text-right">
						<button type="submit" name="cancel" class="btn btn-secondary" formnovalidate>Cancel</button>
						<button type="submit" name="next" class="btn btn-primary px-4">Next</button>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col">
						<div class="alert alert-danger text-center" role="alert">Please fillup the necessary form correctly. You can't edit it after</div>
						<div class="alert alert-success text-center" role="alert">To avoid any problems, do not use any other buttons besides those listed in this form.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
</div>
</body>
</html>
<?php 
if (isset($_POST['next'])) {
	$_SESSION['fname'] = $_POST['fname'];
	$_SESSION['mname'] = $_POST['mname'];
	$_SESSION['lname'] = $_POST['lname'];
	$_SESSION['bday'] = $_POST['bday'];
	$_SESSION['gender'] = $_POST['gender'];
	$_SESSION['status'] = $_POST['status'];
	$_SESSION['StdHNo'] = $_POST['StdHNo'];
	$_SESSION['StdStreet'] = $_POST['StdStreet'];
	$_SESSION['StdBarangay'] = $_POST['StdBarangay'];
	$_SESSION['StdCity'] = $_POST['StdCity'];
	$_SESSION['StdZip'] = $_POST['StdZip'];
	?>
	<script type="text/javascript">
		window.location = "acadinfo.php";
	</script>
	<?php
}
if (isset($_POST['cancel'])) {
	session_destroy();
	?>
	<script type="text/javascript">
		window.location = "../login.php";
	</script>
	<?php
}

?>