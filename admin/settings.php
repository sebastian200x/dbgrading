<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Academic Settings</title>
</head>
<body>
	<h3 class="text-center">Change Academic Info</h3>
	
	<?php $acadyear = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM academicinfo")); ?>
	<form method="post">
		<div class="container mx-auto align-middle m-5">
			<div class="form-group row">
				<label for="inputEmail3" class="col-form-label">Academic Year: </label>
				<div class="col-6">
					<select class="form-control form-control-sm" name="Year" id="Year" required>
						<?php 
						if ($acadyear['Sem'] == null) {
							?>
							<option selected hidden value="">Please Select Academic Year</option>
							<?php
						}
						else{
							?>
							<option selected hidden value="<?php echo $acadyear['AY']; ?>"><?php echo $acadyear['AY']; ?></option>
							<?php 
						}
						$year3 = date('Y', strtotime('-1 Year'));
						echo $year3;
						for($i = $year3; $i < date('Y', strtotime('+2 Year')); $i++){
							echo "<option>" . $i . '-' . ($i+1) . "</option>";
						}
						?>
					</select>
				</div>
				<label for="inputEmail3" class="col-form-label">Semester:</label>
				<div class="col-3">
					<select class="form-control form-control-sm" name="Sem" id="Sem" required>
						<?php 
						if ($acadyear['Sem'] == null) {
							?>
							<option selected hidden value="">Please Select Semester</option>
							<?php
						}
						else{
							?>
							<option selected hidden value="<?php echo $acadyear['Sem']; ?>"><?php echo $acadyear['Sem'];?></option>
							<?php 
						} 
						?>
						<option value="1st">1st</option>
						<option value="2nd">2nd</option>
					</select>
				</div>

				<div class="col-12 text-center">
					<button type="submit" class="btn btn-primary" name="updateAY">Update Academic Year</button>
				</div>
			</div>

		</div>
	</form>
</body>
</html>
<?php
if(isset($_POST['updateAY'])){
	$Year = $_POST['Year'];
	$Sem = $_POST['Sem'];
	$Info = mysqli_query($db, "SELECT DISTINCT * FROM academicinfo");
	if(mysqli_num_rows($Info) > 0) {
		mysqli_query($db, "UPDATE academicinfo SET AY = '$Year', Sem = '$Sem'");
		?>
		<script type="text/javascript">
			window.location = "settings.php";
			window.alert("Update Successfully");
		</script>
		<?php
	}
	else
	{
		mysqli_query($db, "INSERT INTO academicinfo(AY, Sem) VALUES ('$Year','$Sem')");
		?>
		<script type="text/javascript">
			window.location = "settings.php";
			window.alert("Update Successfully");
		</script>
		<?php

	}
}
?>