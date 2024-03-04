<?php include_once "navbar.php";
$profid = $_SESSION['PID']; 
$ACADEMICYEAR = $_SESSION['ACADEMICYEAR'];
$ACADEMICSEM = $_SESSION['ACADEMICSEM'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Professor Edit</title>
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
				$subinfo = mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT * FROM tblsubinfo WHERE ProfID = '$profid'"));
				?>
				<h6>Information:</h6>
				<h6>Name: <?php echo $profinfo['ProfFName'].' '.$profinfo['ProfLName']; ?></h6>
				<?php 
				if (isset($subinfo['SubName']) == null){ 
					?>
					<script type="text/javascript">
						window.location = "profsubedit.php";
						window.alert("Please Edit Subject First");
					</script>
					<?php
				}
				else
				{
					?>
					<h6>Subject: <?php echo $subinfo['SubName']; ?></h6>
					<?php 
				} 
				?>
			</div>
			<div class="col-12 text-right">
				<button type="submit" class="btn btn-success m-3 px-3" name="addbtn"><i class="bi bi-plus-circle-fill" ></i> Add Section</button>
			</div>
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th>Section(s)</th>
						<th colspan="2">UPDATE/DELETE</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$subsec = mysqli_query($db, "SELECT DISTINCT SubSec FROM tblsubinfo WHERE ProfID = '$profid'");
					if (mysqli_num_rows($subsec) <> null){
						?>
						<?php
						while($subsecf = mysqli_fetch_assoc($subsec)){
							$subinfo = mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT * FROM tblsubinfo WHERE ProfID = '$profid'"));
							?>
							<tr>
								<th class="col-10">
									<input type="text" class="form-control" name="section" value="<?php echo $subinfo['SubSec'];?>" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="Section">
								</th>
								<th class="col-1">
									<button class="btn btn-success" name="update" value="<?php echo $subinfo['SubID'];?>"><i class="bi bi-box-arrow-up"></i></button>
								</th>
								<th class="col-1">
									<button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" name="deletebtn" id="delete"><i class="bi bi-trash-fill" value="<?php echo $subinfo['SubID'];?>"></i></button>
								</th>
							</tr>
							<?php
						}
					}
					else{
						?>
						<th class="col-10">
							<input type="text" class="form-control" name="section" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="Subject Code">
						</th>
						<th class="col-1">
							<button class="btn btn-success" name="update"><i class="bi bi-box-arrow-up"></i></button>
						</th>
						<th class="col-1">
							<button onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" name="deletebtn" id="delete"><i class="bi bi-trash-fill"></i></button>
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

if (isset($_POST['update'])) {
	$subid = $_POST['update'];
	$subsec = $_POST['section'];
		mysqli_query($db, "
			UPDATE
			tblsubinfo
			SET
			SubSec = '$subsec'
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
