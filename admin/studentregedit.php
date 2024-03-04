<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Students from Registration</title>
</head>
<body>
	<?php 
	if (!isset($_SESSION['StdID'])) {
		?>
		<script type="text/javascript">
			window.location = "addstudent.php";
		</script>
		<?php 
	} 
	?>
	<form method="post">
		<div class="row border rounded m-3">
			<div class="col-12">
				<h4 class="text-center">Register Student</h4>
			</div>
			<div class="row p-3">
				<?php
				$StudentID = $_SESSION['StdID'];
				$query = mysqli_query($db, "SELECT DISTINCT * FROM tblstdinfo, tblacadinfo, tblstd WHERE tblstdinfo.StdID = '$StudentID' AND tblacadinfo.StdID  = '$StudentID' AND tblstd.StdID = '$StudentID'");
				$info = mysqli_fetch_assoc($query);
				?>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<h6 class="mb-2 text-primary">Information</h6>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
					<div class="form-group">
						<label for="fname">First Name</label>
						<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $info['StdFName'] ?>" placeholder="First Name" required>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
					<div class="form-group">
						<label for="mname">Middle Name</label>
						<input type="text" class="form-control" id="mname" name="mname" value="<?php echo $info['StdMName'] ?>" placeholder="Middle Name">
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
					<div class="form-group">
						<label for="lname">Last Name</label>
						<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $info['StdLName'] ?>" placeholder="Last Name" required>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
					
                        <div class="form-group">
							<label for="bday">Date of Birth</label>
							<input type="date" class="form-control" id="bday" placeholder="Birthday" name="bday" required value="<?php echo $info['StdBday'] ?>">
				        </div>
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
					<div class="form-group">
						<label for="gender">Gender</label>
						<input type="text" class="form-control" id="gender" name="gender" list="gender-list" value="<?php echo $info['StdSex'] ?>" placeholder="Gender" required>
						<datalist id="gender-list">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</datalist>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
					<div class="form-group">
						<label for="civil">Civil Status</label>
						<input type="text" class="form-control" id="civil" name="status" value="<?php echo $info['StdStatus'] ?>" placeholder="Civil Status" required>
					</div>
				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<h6 class="mb-2 text-primary">Address</h6>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
					<div class="form-group">
						<label for="StdHNo">House No.</label>
						<input type="text" class="form-control" id="StdHNo" placeholder="House Number" value="<?php echo $info['StdHNo'] ?>" name="StdHNo" required>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
					<div class="form-group">
						<label for="StdStreet">Street</label>
						<input type="text" class="form-control" id="StdStreet" placeholder="Street" value="<?php echo $info['StdStreet'] ?>" name="StdStreet" required>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
					<div class="form-group">
						<label for="StdBarangay">Barangay</label>
						<input type="text" class="form-control" id="StdBarangay" placeholder="Barangay" value="<?php echo $info['StdBarangay'] ?>" name="StdBarangay" required>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
					<div class="form-group">
						<label for="StdCity">City</label>
						<input type="text" class="form-control" id="StdCity" placeholder="City" value="<?php echo $info['StdCity'] ?>" name="StdCity" required>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
					<div class="form-group">
						<label for="StdZip">Zip Code</label>
						<input type="number" class="form-control" id="StdZip" pattern="(?=.*?[0-9])[0-9]{4}" placeholder="Zip Code" value="<?php echo $info['StdZip'] ?>"name="StdZip" maxlength="4" required>
					</div>
				</div>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<h6 class="mb-2 text-primary">Academic Info</h6>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
					<div class="form-group">
						<label for="section">Student Number</label>
						<input type="number" class="form-control" id="stdno" name="stdno" value="<?php echo $info['StdUser'] ?>" name="stdno" placeholder="Student Number" required>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
					<div class="form-group">
						<label for="sec">Section</label>
						<small class="text-muted">Ex: 1A, 2B</small>
                        <div class="input-group">
                            <div class="input-group-prepend">
						      <span class="input-group-text" id="inputGroupPrepend"><?php echo $info['StdYear']." Year" ?></span>
                            </div>
                        <input class="form-control" type="text" pattern="[A-Z]" maxlength="1" title="Please put section only." id="sec" name="sec" placeholder="Section" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" required>
					    </div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
					<div class="form-group">
						<label for="dept">Department</label>
						<input class="form-control" type="text" list="dept-list" id="dept" name="dept" placeholder="Department" value="<?php echo $info['StdDept']; ?>" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
						<datalist id="dept-list">
							<?php 
							$deptq = mysqli_query($db, "SELECT DISTINCT StdDept FROM tblacadinfo");
							while($deptf = mysqli_fetch_assoc($deptq)){ 
								?>
								<option value="<?php echo $deptf['StdDept'] ?>"></option>
							<?php } ?>
						</datalist>
					</div>
				</div>
				<div class="col-3">
				</div>
				<div class="col-6">
					<div class="form-group text-center">
						<label for="course">Course</label>
						<input class="form-control text-center" type="text" id="course" name="course" placeholder="Course" readonly value="<?php echo $info['StdCourse'] ?>">
					</div>
				</div>
				<div class="col-3">
				</div>
				<div class="col-12 text-center">
					<button type="submit" id="accept" name="accept" class="btn btn-success">Accept Student</button>
					<button type="submit" id="cancel" name="cancel" class="btn btn-secondary">Cancel</button>
				</div>
			</div>
		</form>
	</body>
	</html>
	<?php 
	if (isset($_POST['accept'])) {
		
		$stdno = $_POST['stdno'];

		$accept1 = "UPDATE
		`tblstd`
		SET
		`StdUser` = '$stdno',
		`StdReg` = '1'
		WHERE StdID = '$StudentID'";

		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$bday = $_POST['bday'];
		$gender = $_POST['gender'];
		$status = $_POST['status'];
		$stdhno = $_POST['StdHNo'];
		$stdstreet = $_POST['StdStreet'];
		$stdbarangay = $_POST['StdBarangay'];
		$stdcity = $_POST['StdCity'];
		$stdzip = $_POST['StdZip'];

		$accept2 = "UPDATE
		`tblstdinfo`
		SET
		`StdFName` = '$fname',
		`StdMName` = '$mname',
		`StdLName` = '$lname',
		`StdBday` = '$bday',
		`StdSex` = '$gender',
		`StdStatus` = '$status',
		`StdHNo` = '$stdhno',
		`StdStreet` = '$stdstreet',
		`StdBarangay` = '$stdbarangay',
		`StdCity` = '$stdcity',
		`StdZip` = '$stdzip'
		WHERE StdID = '$StudentID'";

		$stdsec = $_POST['sec'];
        $year = (int)filter_var($info['StdYear'], FILTER_SANITIZE_NUMBER_INT);
		$fullsec = "BSIT ".$year.$stdsec;
		$stdcourse = $_POST['course'];
		$stddept = $_POST['dept'];
		$AY = mysqli_fetch_assoc(mysqli_query($db, "SELECT AY FROM academicinfo"));
        $acadAY = $AY['AY'];
        $Sem = mysqli_fetch_assoc(mysqli_query($db, "SELECT Sem FROM academicinfo"));
        $acadSem = $Sem['Sem'];

		$accept3 = "UPDATE
		`tblacadinfo`
		SET
		`StdSec` = '$fullsec',
		`StdDept` = '$stddept',
		`StdAY` = '$acadAY',
		`StdSem` = '$acadSem',
		`StdCourse` = '$stdcourse'
		WHERE StdID = '$StudentID'";

		$accept_1 = mysqli_query($db, $accept1);
		$accept_2 = mysqli_query($db, $accept2);
		$accept_3 = mysqli_query($db, $accept3);

		unset($_SESSION['StdID']);
		?>
		<script type="text/javascript">
			window.location = "addstudent.php";
			window.alert("Student Accepted");
		</script>
		<?php
	}
	?>