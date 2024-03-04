<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Subject</title>
</head>
<body>
	<?php 
	$section = $_SESSION['section'];
	$query = mysqli_query($db, "SELECT DISTINCT SubName, ProfFName, ProfLName FROM tblsubinfo, tblprof WHERE tblsubinfo.SubSec = '$section' AND tblprof.ProfID = tblsubinfo.ProfID");
	?>
	<form method="post">
		<div class="container p-3 my-3 border">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<h4 class="mb-2 text-center">Subjects of <?php echo $section ?></h4>
				</div>
				<table class="table table-bordered mx-4">
					<?php
					if (mysqli_num_rows($query) > 0) {
						?>
						<thead>
							<tr>
								<th>
									<div class="text-left">
										Subjects
									</div>
								</th>
							</tr>
						</thead>
						<?php
						while($info = mysqli_fetch_assoc($query)){ 
							?>
							<tbody>
								<tr>
									<td class="col-12 text-center">
										<?php echo $info['SubName'] ?>
									</td>
								</tr>
							</tbody>
							<?php
						} }
						else{
							?>
							<tr>
								<td colspan="3" class="text-center h4">
									<?php echo "No Subject" ?>
								</td>
							</tr>

						<?php } ?>
					</table>
					<!-- <table class="table table-bordered mt-2">
						<thead>
							<tr>
								<th>
									<div class="row">
										<div class="col-6 text-left">
											Subjects
										</div>
										<div class="col-6 text-right">
											<button type="submit" class="btn btn-success text-right" name="addsub"><i class="bi bi-plus-circle-fill"></i> Add Subject</button>
										</div>
									</div>

								</th>

								<th colspan="3">
									Professor
								</th>
							</tr>
						</thead>
						<?php
						if (mysqli_num_rows($query) <= 0) {
							?>
							<td>
								<?php echo "No Subject" ?>
							</td>
							<?php
						}
						while($info = mysqli_fetch_assoc($query)){ 
							?>
							<tbody>

								<tr>
									<td>
										<input class="form-control" type="text" list="sub-list" id="sub" name="sub" placeholder="Subject" value="<?php echo $info['SubName'] ?>" />
										<datalist id="sub-list">
											<option value="<?php echo $info['SubName'] ?>"></option>
										</datalist>
									</td>
									<td>
										<input class="form-control" type="text" list="sub-list" id="sub" name="sub" placeholder="Subject" value="<?php echo $info['ProfFName'] ?>"/>
										<datalist id="sub-list">
											<option value="<?php echo $info['ProfFName'] ?>"></option>
										</datalist>
									</td>
								</tr>
							</tbody>
						<?php } ?>
					</table> -->
				</div>
			</div>
		</form>
	</body>
	</html>