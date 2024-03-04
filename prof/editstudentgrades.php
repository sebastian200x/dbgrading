<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Student Grades</title>
</head>
<body>
	<form method="post">
		<?php
		$profid = $_SESSION['ProfID'];
		$profsec = $_SESSION['section'];
		$stdlist = mysqli_query($db, "SELECT DISTINCT tblstdinfo.*, tblgrades.SubGrade FROM tblstdinfo, tblgrades, tblsubinfo, tblacadinfo
			WHERE
			tblacadinfo.StdID = tblstdinfo.StdID
			AND
			tblstdinfo.StdID = tblgrades.StdID
			AND
			tblacadinfo.StdSec = tblsubinfo.SubSec
			AND 
			tblsubinfo.ProfID = tblgrades.ProfID
			AND 
			tblsubinfo.ProfID = '$profid'
			AND
			tblsubinfo.SubSec = '$profsec';
			");
			?>
			<div class="container-fluid p-4"> <!-- pt = padding top, mt = margin top -->
				<!-- 1st ROW on table title -->
				<div class="row">
					<div class="col-12">
						<h3 class="text-center text-bold"><b>Student List of <?php echo $profsec ?></b></h3>
					</div>
				</div>
				<table class="table table-bordered table-hover text-center" id="myTable">
					<thead class="thead-light">
						<tr>
							<th scope="col">Last Name</th>
							<th scope="col">First Name</th>
							<th scope="col">Middle Name</th>
							<th scope="col">Student Grade</th>
						</tr>
					</thead>
					<tbody>
						
						<?php
						if (mysqli_num_rows($stdlist) <> 0) {
							$stdid = array();
							while ($stds = mysqli_fetch_assoc($stdlist)) {
								$stdid[] = $stds['StdID'];
								?>
								<tr>
									<td><?php echo $stds['StdLName']; ?></td>
									<td><?php echo $stds['StdFName']; ?></td>
									<td><?php echo $stds['StdMName']; ?></td>
									<td class="col-2">
										<input class="form-control" type="number" list="section-list" id="grade" name="grade[]" placeholder="Grade" value="<?php echo $stds['SubGrade']; ?>">
									</td>
									<?php
								}
							}
							else{
								?>
								<td colspan="3">No Student</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</div>
			</table>
		</tr>
		<div class="text-right"> <button class="btn btn-success px-4 mr-3" name="savegrade"><i class="bi bi-file-earmark-arrow-up"></i> Save</button> </div>
	</div>
</form>
<?php
if (isset($_POST['savegrade'])) {
	$N = count($stdid);
	for($a=0; $a < $N; $a++){
		$stdgrade = $_POST['grade'][$a];
		$stdid1 = $stdid[$a];
		$updategrade = mysqli_query($db, "UPDATE tblgrades SET SubGrade = '$stdgrade' WHERE StdID = '$stdid1' AND ProfID = '$profid'");
	}
    ?>
	<script type="text/javascript">
		window.location="editstudentgrades.php";
		window.alert("Update Successfully");
	</script>
	<?php

}
?>
</body>
</html>
<!-- 
$grade= $_POST['grade'];
	$N = count($grade);
	for($a=0; $a < $N; $a++)
	{
		echo ($grade[$a]); 

	}
	foreach ($stdid as $stdids) {
		$updategrade = mysqli_query($db, "UPDATE tblgrades SET SubGrade = '$grade[$a]' WHERE StdID = '$stdids'");
}-->