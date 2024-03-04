<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enrollment</title>
</head>
<body>
	<form method="post">
		<div class="container p-3 my-3 border">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link" href="studentinfo.php">Edit Information</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#">Enrollment</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="changepass.php">Change Password</a>
				</li>
			</ul>

			<table class="table table-bordered mt-4 text-center">
				<thead>
					<tr>
						<th scope="col">Subject Code</th>
						<th scope="col">Subject Name</th>
						<th scope="col">Subject Unit</th>
						<th scope="col">Enroll</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$StudentID = $_SESSION['StudentID'];
					$section = mysqli_fetch_assoc(mysqli_query($db, "SELECT StdSec FROM tblacadinfo WHERE StdID = '$StudentID'"));
					$sec = $section['StdSec'];
					$subs = mysqli_query($db, "SELECT * FROM tblsubinfo WHERE SubSec = '$sec' AND tblsubinfo.SubID NOT IN (SELECT tblgrades.SubID FROM tblgrades)");
					while($subenroll = mysqli_fetch_assoc($subs)){
						?>
						<tr>
							<th><?php echo $subenroll['SubCode']; ?></th>
							<td><?php echo $subenroll['SubName']; ?></td>
							<td><?php echo $subenroll['SubUnit']; ?></td>
							<td><button class="btn btn-primary" name="enroll" value="<?php echo $subenroll['SubID']; ?>" onclick="return confirm('Are you sure you want to enroll this subject?')"><i class="bi bi-journal-arrow-down"></i> Enroll</button></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</form>
</body>
</html>
<?php 
if (isset($_POST['enroll'])) {
	$subid = $_POST['enroll'];
	$profenroll = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tblsubinfo WHERE SubID = '$subid'"));
	$sem = $profenroll['SubSem'];
	$AY = $profenroll['SubAY'];
	$prof = $profenroll['ProfID'];

$enrollment = mysqli_query($db, "INSERT INTO `tblgrades`(
    `SubID`,
    `GradeSem`,
    `GradeAY`,
    `ProfID`,
    `StdID`
)
VALUES(
    '$subid',
    '$sem',
    '$AY',
    '$prof',
    '$StudentID'
)");
?>
<script type="text/javascript">
	window.alert("Enrolled!");
	window.location = "enroll.php";
</script>
<?php
}
 ?>