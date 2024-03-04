<?php 
include_once "navbar.php"; 
$ACADEMICYEAR = $_SESSION['ACADEMICYEAR'];
$ACADEMICSEM = $_SESSION['ACADEMICSEM'];
?>
<!DOCTYPE>
<html>
<head>
	<title>Edit Student Grades</title>
	<script type="text/javascript" src="include/autocapital.js"></script>
</head>
<body>
	<?php
	$profid = $_SESSION['ProfID'];
	$yearquery = mysqli_query($db, "SELECT DISTINCT tblacadinfo.StdYear FROM tblsubinfo, tblacadinfo WHERE tblsubinfo.SubSec =  tblacadinfo.StdSec AND tblsubinfo.ProfID = '$profid' ORDER BY StdYear ASC");
	$secquery = mysqli_query($db, "SELECT DISTINCT tblsubinfo.SubSec FROM tblsubinfo WHERE tblsubinfo.ProfID = '$profid' ORDER BY SubSec ASC");
	$subquery = mysqli_query($db,"SELECT DISTINCT SubName FROM tblsubinfo WHERE ProfID = '$profid'");
	$sub = mysqli_fetch_assoc($subquery);
	?>
	<div class="container p-4 mt-4">
		<div class="row">
			<div class="col">
				<h3>Edit Student Grades</h3>
				<small class="text-muted">Subject: <?php echo $sub['SubName']; ?></small>
			</div>
			<?php
             if(mysqli_num_rows($yearquery) <> null){

			while($yearfetch = mysqli_fetch_assoc($yearquery)){
				?>
				<div class="container mt-4 pt-3	 border border-secondary">
					<b><?php echo $yearfetch['StdYear'] . ' Year'; ?></b>
					<?php $year = $yearfetch['StdYear']; ?>
					<div class="row">
						<?php
						while($secfetch = mysqli_fetch_assoc($secquery)){
							?>
							<div class="col-4 pt-2 pb-3">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title"><?php 
										$_SESSION['profsec'] = $secfetch['SubSec'];
										echo $_SESSION['profsec'];
										$profsec = $_SESSION['profsec'];
									?></h5>
									<p class="card-text">Bachelor of Science in Information Technology</p>
								<form method="post">
									<button class="btn btn-primary" name="editstudent" value="<?php echo $profsec ?>">Edit Student Grades</button>
								</form>
							</div>
						</div>
					</div>
					<?php 
				} 
				?>
			</div>
            
		</div>
        <?php
            }
             }
            else{

                ?>
<div class="col-12 text-center">
                <h3> No Subject to manage</h3>
                </div>
                <?php
            }

		?>
		<?php 
	?>
</div>
</div>
</body>
</html>
<?php 
if (isset($_POST['editstudent'])) {
	$_SESSION['section'] = $_POST['editstudent']; //This is for the value of the button that connects to the section
	?>
	<script type="text/javascript">
		window.location = "editstudentgrades.php";
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
