<?php include_once "navbar.php"; ?>
<!DOCTYPE>
<html>
<head>
	<title>Sections</title>
</head>
<body>
	<?php 
$ACADEMICYEAR = $_SESSION['ACADEMICYEAR'];
$ACADEMICSEM = $_SESSION['ACADEMICSEM'];
	 ?>
	<div class="container p-4 mt-4">
		<div class="row">
			<div class="col-9">
				<h3>Edit Students</h3>
			</div>
			<div class="col-3 text-center">
				<form method="post">
					<button type="submit" class="btn btn-success px-5 text-center" name="addbtn"><i class="bi bi-plus-circle-fill" ></i> Add Student<br>
					</button>
				</form>
				<?php
				$std = mysqli_fetch_assoc(mysqli_query($db, "SELECT Count(StdReg) AS regs FROM tblstd WHERE StdReg = '0'"));
				if ($std['regs'] <> 0) {
					?>
					<small class="text-muted"><b>New Student Register: <?php echo $std['regs']; ?></b></small>
					<?php
				}
				else{
					?>
					<small class="text-muted">No New Student Register</small>
					<?php
				}
				?>
			</div>	
		</div>
		<?php 
		$yearquery = mysqli_query($db, "SELECT DISTINCT StdYear FROM tblacadinfo, tblstd WHERE tblstd.StdID = tblacadinfo.StdID AND tblstd.StdReg = '1' AND tblacadinfo.StdAY = '$ACADEMICYEAR' AND tblacadinfo.StdSem = '$ACADEMICSEM' ORDER BY StdYear ASC");
        if (mysqli_num_rows($yearquery) <> 0) {
		while($yearfetch = mysqli_fetch_assoc($yearquery)){ 
			?>
			<div class="container mt-4 pt-3	 border border-secondary">
				<b><?php echo $yearfetch['StdYear'] . ' Year'; ?></b>
				<?php $year = $yearfetch['StdYear']; ?>
				<div class="row">
					<?php
					$secquery = mysqli_query($db, "SELECT DISTINCT StdSec, StdCourse FROM tblacadinfo, tblstd WHERE StdYear = '$year' AND tblacadinfo.StdID = tblstd.StdID AND tblstd.StdReg = '1' ORDER BY StdSec ASC");
					
					while($secfetch = mysqli_fetch_assoc($secquery)){
						?>
						<div class="col-4 pt-2 pb-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title"><?php 
									$_SESSION['section'] = $secfetch['StdSec'];
									echo $_SESSION['section'];
									$section = $_SESSION['section'];
								?></h5>
								<p class="card-text"><?php
								$_SESSION['course'] = $secfetch['StdCourse'];
								echo $_SESSION['course'];
							?></p>
							<form method="post">
								<button class="btn btn-primary" name="editstudent" value="<?php echo $section ?>">Edit Section</button>
							</form>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
<?php }
         }
         else{
             ?>
             <h4 class="text-center">No Students</h4>
             <?php
         } ?>
</div>
</body>
</html>

<?php 
if (isset($_POST['editstudent'])) {
	$_SESSION['section'] = $_POST['editstudent']; //This is for the value of the button that connects to the section
	?>
	<script type="text/javascript">
		window.location = "studentCRUD.php";
	</script>
	<?php
}
else{
	unset($_SESSION['course']);
	unset($_SESSION['section']);
}
if (isset($_POST['addbtn'])) {
	?>
	<script type="text/javascript">
		window.location = "addstudent.php";
	</script>
	<?php
}
?>
