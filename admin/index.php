<?php include "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 text-center">
				<h1 class="mt-3 ml-4">DASHBOARD</h1>
				<?php
				$acadyear = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM academicinfo"));
				?>
				<h3>
					<?php 
					$Info = mysqli_query($db, "SELECT DISTINCT * FROM academicinfo");
					if(mysqli_num_rows($Info) > 0) {
						echo 'Academic Year: ' . $acadyear['AY'] . ' ' . $acadyear['Sem'] . ' Sem';
					}
					else
					{
						?>
						<script type="text/javascript">
							window.alert("Please Put Academic Info First");
							window.location = "settings.php";
						</script>
						<?php

					}
					?>
				</h3>
				<a button type="button" class="btn btn-secondary text-white my-3" href="settings.php"><i class="bi bi-sliders"></i> Academic Settings</a>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						Professor
					</div>
					<div class="card-body col-8">
						<?php 
						$prof = mysqli_query($db, "SELECT COUNT(DISTINCT ProfID) AS profs FROM tblprof");
						$profcount = mysqli_fetch_assoc($prof);
						?>
						<h5 class="card-title"><?php echo $profcount['profs'] ?></h5>
						<p class="card-text">Current Number of Professor(s)</p>
						<a href="profCRUD.php" class="btn btn-primary">Edit Professor Users</a>
					</div>
					<div class="col-4">
						<i class="bi bi-person-vcard"></i>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						Student
					</div>
					<div class="card-body">
						<?php 
						$std = mysqli_query($db, "SELECT COUNT(DISTINCT StdID) AS stds FROM tblstd WHERE StdReg = '1'");
						$stdcount = mysqli_fetch_assoc($std);
						?>
						<h5 class="card-title"><?php echo $stdcount['stds'] ?></h5>
						<p class="card-text">Current Number of Student(s)</p>
						<a href="studentCRUDmenu.php" class="btn btn-primary">Edit Student Users</a>
					</div>
				</div>
			</div>
			<div class="col-6 mt-4">
				<div class="card">
					<div class="card-header">
						Subjects
					</div>
					<div class="card-body">
						<?php 
						$sub = mysqli_query($db, "SELECT COUNT(DISTINCT SubName) AS sub FROM tblsubinfo");
						$subcount = mysqli_fetch_assoc($sub);
						?>
						<h5 class="card-title"><?php echo $subcount['sub'] ?></h5>
						<p class="card-text">Current Number of Subjects(s)</p>
						<a href="subjectlist.php" class="btn btn-primary">Edit Subjects</a>

					</div>
				</div>
			</div>
			<div class="col-6 mt-4">
				<div class="card">
					<div class="card-header">
						Sections
					</div>
					<div class="card-body">
						<?php 
						$sec = mysqli_query($db, "SELECT COUNT(DISTINCT StdSec) AS sec FROM tblacadinfo, tblstd WHERE tblacadinfo.StdID = tblstd.StdID AND tblstd.StdReg = '1' ");
						$secount = mysqli_fetch_assoc($sec);
						?>
						<h5 class="card-title"><?php echo $secount['sec'] ?></h5>
						<p class="card-text">Current Number of Sections(s)</p>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
