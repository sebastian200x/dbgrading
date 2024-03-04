<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Academic Registration</title>
</head>
<body>
	<div class="container p-5 my-5 border">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<p class="nav-link">Account Registration</p>
			</li>
			<li class="nav-item">
				<p class="nav-link">Information Registration</p>
			</li>
			<li class="nav-item">
				<p class="nav-link active text-primary">Academic Registration</p>
			</li>
		</ul>
		<form method="post">
			<div class="container">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 py-2">
					<h6 class="mb-2 text-primary">Academic Info</h6>
				</div>
				<div class="row justify-content-center">
                    <div class="col-4">
                        <label for="year">Year Level</label>
                            <select class="form-control" id="year" name="year" required>
                                <option disabled selected hidden value="">Please select Year Level</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                            </select>
                    </div>
					<div class="col-6">
						<label for="course">Course</label>
						<select class="form-control" id="course" name="course" required>
							<option disabled selected hidden value="">Please select Course</option>
							<option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
						</select>
					</div>	
					
					<div class="col-12 bg-white center">
						<div class="text-center">
							<div class="mt-2">
								<button type="submit" name="cancel" class="btn btn-secondary" formnovalidate>Cancel</button>
								<button type="submit" name="register" class="btn btn-primary">Register</button>
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
if (isset($_POST['register'])) {
	$regstdnum = $_SESSION['regstdnum'];
	$regstdpass = $_SESSION['regstdpass'];
	$regstdemail = $_SESSION['regstdemail'];
	
	$insert1 = "INSERT INTO `tblstd`(
	`StdUser`,
	`StdPass`,
	`StdEmail`,
	`StdReg`
)
VALUES(
'$regstdnum',
'$regstdpass',
'$regstdemail',
'0'
)";
if (mysqli_query($db, $insert1)){
	$lastID = mysqli_insert_id($db);
	$fname = $_SESSION['fname'];
	$mname = $_SESSION['mname'];
	$lname = $_SESSION['lname'];
	$bday = $_SESSION['bday'];
	$gender = $_SESSION['gender'];
	$status = $_SESSION['status'];
	$stdhno = $_SESSION['StdHNo'];
	$stdstreet = $_SESSION['StdStreet'];
	$stdbarangay = $_SESSION['StdBarangay'];
	$stdcity = $_SESSION['StdCity'];
	$stdzip = $_SESSION['StdZip'];

	$insert2 = "INSERT INTO `tblstdinfo` (
	`StdID`,
	`StdFName`,
	`StdMName`,
	`StdLName`,
	`StdBday`,
	`StdSex`,
	`StdStatus`,
	`StdHNo`,
	`StdStreet`,
	`StdBarangay`,
	`StdCity`,
	`StdZip`)
	VALUES(
	'$lastID',
	'$fname',
	'$mname',
	'$lname',
	'$bday',
	'$gender',
	'$status',
	'$stdhno',
	'$stdstreet',
	'$stdbarangay',
	'$stdcity',
	'$stdzip'
)";
$course = $_POST['course'];
$year = $_POST['year'];
$insert3 = "INSERT INTO `tblacadinfo`(
`StdID`,
`StdSec`,
`StdCourse`,
`StdDept`,
`StdYear`
)
VALUES(
'$lastID',
'',
'$course',
'CSS',
'$year'
)";
$register2 = mysqli_query($db, $insert2);
$register3 = mysqli_query($db, $insert3);
session_destroy();
?>
<script type="text/javascript">
	window.alert("Registered Successfully");
	window.location = "../login.php";
</script>
<?php
}
else{
	?>
	<script type="text/javascript">
		window.alert("ERORR! Register Failed");
	</script>
	<?php
}
}
?>