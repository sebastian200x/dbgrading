<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Password Changer</title>
</head>

<body>
	<div class="container border border-dark p-5 m-5">
		<form method="post">
			<h3 class="text-center">Change Password (Student)</h3>
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
					placeholder="Student Number" name="StudentNo">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
					name="password">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Student Id</label>
				<input type="number" class="form-control" id="exampleInputPassword1" placeholder="Student ID"
					name="StudentID">
			</div>
			<button type="submit" class="btn btn-primary" name="changestd">Submit</button>
		</form>
	</div>


	<div class="container border border-dark p-5 m-5">
		<form method="post">
			<h3 class="text-center">Change Password (Professor)</h3>
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
					placeholder="Username" name="username1">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
					name="password2">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Prof Id</label>
				<input type="number" class="form-control" id="exampleInputPassword1" placeholder="ID" name="ProfID">
			</div>
			<button type="submit" class="btn btn-primary" name="changeprof">Submit</button>
		</form>
	</div>


	<div class="container border border-dark p-5 m-5">
		<form method="post">
			<h3 class="text-center">Change Password (Admin)</h3>
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
					placeholder="Username" name="username2">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
					name="password3">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Admin Id</label>
				<input type="number" class="form-control" id="exampleInputPassword1" placeholder="ID" name="AdminID">
			</div>
			<button type="submit" class="btn btn-primary" name="changeadmin">Submit</button>
		</form>
	</div>
</body>

</html>

<?php if (isset($_POST['changestd'])) {
	$StudentID = $_POST['StudentID'];
	$StudentNo = $_POST['StudentNo'];
	$hashpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$changepass = mysqli_query($db, "UPDATE tblstd SET StdPass = '$hashpassword' WHERE tblstd.StdID = $StudentID AND tblstd.StdUser = $StudentNo");
	?>
	<script type="text/javascript">
		window.alert("Update Successfully!");
	</script>
	<?php
} ?>

<?php if (isset($_POST['changeprof'])) {
	$ProfID = $_POST['ProfID'];
	$ProfUser = $_POST['username1'];
	$hashpassword = password_hash($_POST['password2'], PASSWORD_DEFAULT);
	$changepass = mysqli_query($db, "UPDATE tblprof SET ProfPass = '$hashpassword' WHERE tblprof.ProfUser = '$ProfUser' AND tblprof.ProfID = '$ProfID'");
	?>
	<script type="text/javascript">
		window.alert("Update Successfully!");
	</script>
	<?php
} ?>

<?php if (isset($_POST['changeadmin'])) {
	$AdminID = $_POST['AdminID'];
	$AdminUser = $_POST['username2'];
	$hashpassword = password_hash($_POST['password3'], PASSWORD_DEFAULT);
	$changepass = mysqli_query($db, "UPDATE tbladmin SET AdminPass = '$hashpassword' WHERE tbladmin.AdminUser = '$AdminUser' AND tbladmin.AdminID = '$AdminID'");
	?>
	<script type="text/javascript">
		window.alert("Update Successfully!");
	</script>
	<?php
} ?>