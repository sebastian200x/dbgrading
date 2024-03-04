<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Student List</title>
</head>
<body>
	<?php
	$profid = $_SESSION['ProfID'];
	$profsec = $_SESSION['section'];
	$stdlist = mysqli_query($db, "SELECT DISTINCT tblstdinfo.* FROM tblstdinfo, tblgrades, tblsubinfo, tblacadinfo
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
			<table class="table table-sm table-bordered table-hover text-center" id="myTable">
				<thead class="thead-light">
					<tr>
						<th scope="col">Last Name</th>
						<th scope="col">First Name</th>
						<th scope="col">Middle Name</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					if (mysqli_num_rows($stdlist) <> 0) {
						while ($stds = mysqli_fetch_assoc($stdlist)) {
							?>
							<tr>
								<td><?php echo $stds['StdLName']; ?></td>
								<td><?php echo $stds['StdFName']; ?></td>
								<td><?php echo $stds['StdMName']; ?></td>
							</tr>
							<?php 
						}
					}
					else{
						?>
						<tr>
							<td colspan="3">No Student</td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</body>
	</html>