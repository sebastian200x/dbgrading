<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Account Registration</title>
	<!-- to disable number arrow in number field -->
	<style type="text/css">
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}
		
		input[type=number] {
			-moz-appearance: textfield;
		}
	</style>
</head>
<body>
	
	<form method="post">
		<div class="container p-5 my-5 border">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<p class="nav-link active text-primary">Account Registration</p>
				</li>
				<li class="nav-item">
					<p class="nav-link">Information Registration</p>
				</li>
				<li class="nav-item">
					<p class="nav-link">Academic Registration</p>
				</li>
			</ul>
			<div class="row justify-content-center P-3 m-3">
				<div class="col-7 bg-white center">
					
					<div class="form-group">
						<label for="Student No">Student Number</label>
						<input type="number" class="form-control" id="Student No" placeholder="Student Number" title="Input Number Only" minlength="8" required name="stdnum">
					</div>
					<div class="form-group">
						<label for="Pass">Password</label>
						<input type="password" class="form-control" id="Password" placeholder="Password" minlength="8" required name="stdpass">
					</div>
					<div class="form-group">
						<label for="Email">Email</label>
						<input type="email" class="form-control" id="Email" placeholder="Email" minlength="8" required name="stdemail">
					</div>
					<div class="text-right">
                        <button type="button" class="btn btn-secondary" name="cancel" onclick="window.location.href = '../login.php'">Cancel</button>
						<button type="submit" class="btn btn-primary px-4" name="next">Next</button>
					</div>
					<div class="alert alert-success text-center m-2" role="alert">To avoid any problems, do not use any other buttons besides those listed in this form.</div>
				</div>
			</div>
		</div>
	</form>
</body>
</html>
<?php
if (isset($_POST['next'])) {
	$query = mysqli_query($db, "SELECT * FROM tblstd");
	$fetch = mysqli_fetch_assoc($query);
	if($_POST['stdnum'] <> $fetch['StdUser']){
		if($_POST['stdemail'] <> $fetch['StdEmail']){
			$_SESSION['regstdnum'] = $_POST['stdnum'];
			$_SESSION['regstdemail'] = $_POST['stdemail'];
			$hashpassword = password_hash($_POST['stdpass'], PASSWORD_DEFAULT);
			$_SESSION['regstdpass'] = $hashpassword;
			?>
			<script type="text/javascript">
				window.location = "info.php";
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				window.alert("Email Registered... Please check or click the cancel to login.");
			</script>
			<?php
		}
	}
	else{
		?>
		<script type="text/javascript">
			window.alert("Student Number Registered... Please check or click the cancel to login.");
		</script>
		<?php
	}
}

?>
