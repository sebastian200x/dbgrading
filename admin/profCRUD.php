<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage Professor Users</title>
</head>
<body>
	<form method="post">
		<div class="container-fluid p-4"> <!-- pt = padding top, mt = margin top -->
			<!-- 1st ROW on table title -->
			<div class="row">
				<div class="col-12">
					<h3 class="text-center text-bold"><b>Edit Professor Users</b></h3>
				</div>
				<div class="col-12 text-right">
					<button type="submit" class="btn btn-success m-3 px-3" name="addbtn"><i class="bi bi-plus-circle-fill" ></i> Add Professor</button>
				</div>
			</div>
			<?php 
			$prof = mysqli_query($db, "SELECT DISTINCT * FROM tblprof");
			if (mysqli_num_rows($prof) <= 0) {
				?>
				<table class="table text-center">
					<thead class="thead-light">
						<tr>
							<th>No Records</th>
						</tr>
					</thead>
				</table>
				<?php 
			}
			else{
				?>
				<table class="table table-bordered table-hover text-center" id="myTable">
					<thead class="thead-light">
						<tr>
							<th scope="col">Last Name</th>
							<th scope="col">First Name</th>
							<th scope="col">Email Address</th>
							<th scope="col">Subject</th>
							<th scope="col" style="width: 5%">EDIT SUBJECT</th>
							<th scope="col" style="width: 5%">EDIT SECTIONS</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($proff = mysqli_fetch_assoc($prof)) {
							?>
							<tr>
								<td><?php echo $proff['ProfLName']; ?></td>
								<td><?php echo $proff['ProfFName']; ?></td>
								<td><?php echo $proff['ProfEmail']; ?></td>
								<?php
								$subprof = $proff['ProfID'];
								$sub = mysqli_query($db, "SELECT DISTINCT SubName FROM tblsubinfo WHERE tblsubinfo.ProfID = $subprof");
								$subf = mysqli_fetch_assoc($sub);
								if ($subf != null){
								?>
								<td><?php echo $subf['SubName']; ?></td>
								<?php
								}
								else{
								    ?>
								    <td>No Subject</td>
								    <?php
								}
								?>
								<td>
									<button class="btn btn-success" name="editsec" value="<?php echo $proff['ProfID']; ?>"><i class="bi bi-pencil-square"></i></button>
								</td>
								<td>
									<button class="btn btn-success" name="editsub" value="<?php echo $proff['ProfID']; ?>"><i class="bi bi-pencil-square"></i></button>
								</td>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
	</body>
</form>
</html>
<?php 
if (isset($_POST['editsub'])) {
	$_SESSION['PID'] = $_POST['editsub']; 
	?>
	<script type="text/javascript">
		window.location = "profedit.php";
	</script>
	<?php 
}
if (isset($_POST['editsec'])) {
	$_SESSION['PID'] = $_POST['editsec']; 
	?>
	<script type="text/javascript">
		window.location = "profsubedit.php";
	</script>
	<?php 
}
if (isset($_POST['addbtn'])) { 
	?>
	<script type="text/javascript">
		window.location = "addprof.php";
	</script>
	<?php 
}