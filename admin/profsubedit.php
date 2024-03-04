<?php
include_once "navbar.php";
$profid = $_SESSION['PID'];
$ACADEMICYEAR = $_SESSION['ACADEMICYEAR'];
$ACADEMICSEM = $_SESSION['ACADEMICSEM'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Professor's Subject</title>
</head>
<body>
	<form method="post">
		<div class="container p-5">
			<div class="col-12">
				<h3 class="text-center text-bold">Edit Professor's Section</h3>
			</div>
			<div class="col-12">
				<?php
				$profinfo = mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT * FROM tblprof WHERE ProfID = '$profid'"));
				?>
				<h6>Information:</h6>
				<h6>Name: <?php echo $profinfo['ProfFName'].' '.$profinfo['ProfLName']; ?></h6>
			</div>
			<?php 
			$prof = mysqli_query($db, "SELECT DISTINCT * FROM tblsubinfo WHERE ProfID = '$profid'");
			if (mysqli_num_rows($prof) <> null) {
				?>
				<table class="table table-bordered text-center mt-4">
					<thead>
						<tr>
							<th>Subject Code</th>
							<th>Subject Name</th>
							<th>Subject Unit</th>
							<th colspan="2">UPDATE / DELETE</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($proff = mysqli_fetch_assoc($prof)) {
							?>
							<tr>
								<th class="col-2">

									<input type="text" class="form-control" name="subcode" value="<?php echo $proff['SubCode']; ?>" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="Subject Code">

								</th>
								<th class="col-6">
									<input type="text" class="form-control" name="subname" value="<?php echo $proff['SubName']; ?>"oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="Subject Name">

								</th>
								<th class="col-2">
									<input type="number" class="form-control" name="subunit" value="<?php echo $proff['SubUnit']; ?>" placeholder="Subject Unit">

								</th>
								<th class="col-1">
									<button type="submit" class="btn btn-success" name="updatebtn" value="<?php $profid ?>"><i class="bi bi-box-arrow-up"></i></button>
								</th>
								<th class="col-1">
									<button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" name="deletebtn" id="delete" value="<?php $profid ?>"><i class="bi bi-trash-fill"></i></button>
								</th>
							</tr>
							<?php 
						} 

					}
					else{
						?>
						<table class="table table-bordered text-center mt-4">
							<thead>
								<tr>
									<th>Subject Code</th>
									<th>Subject Name</th>
									<th>Subject Unit</th>
									<th>UPDATE</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th class="col-4">

										<input type="text" class="form-control" name="subcode" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="Subject Code">

									</th>
									<th class="col-5">
										<input type="text" class="form-control" name="subname" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="Subject Name">

									</th>
									<th class="col-4">
										<input type="number" class="form-control" name="subunit" placeholder="Subject Unit">

									</th>
									<th class="col-1">
										<button type="submit" class="btn btn-success" name="updatebtn" value="<?php $profid ?>"><i class="bi bi-box-arrow-up"></i></button>
									</th>
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
		if (isset($_POST['updatebtn'])) {

			$subcode = $_POST['subcode'];
			$subname = $_POST['subname'];
			$subunit = $_POST['subunit'];

			if (mysqli_num_rows($prof) <> null) {
				mysqli_query($db, "UPDATE
					tblsubinfo
					SET
					SubCode = '$subcode',
					SubName = '$subname',
					SubUnit = '$subunit'
					WHERE
					ProfID = '$profid'
					");
					?>
					<script type="text/javascript">
						window.location = "profCRUD.php";
						window.alert("Updated Successfully");
					</script>
					<?php
				}
				else{
					mysqli_query($db, "INSERT INTO `tblsubinfo`(
						SubCode,
						SubName,
						SubUnit,
						SubSec,
						SubSem,
						SubAY,
						ProfID
					)
					VALUES(
						'$subcode',
						'$subname',
						'$subunit',
						'',
						'$ACADEMICSEM',
						'$ACADEMICYEAR',
                        '$profid'
					)
					");
					?>
					<script type="text/javascript">
						window.location = "profCRUD.php";
						window.alert("Updated Successfully");
					</script>
					<?php
				}
			}
		?>