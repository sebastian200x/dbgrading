<?php 
include_once "navbar.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title>Subject List</title>
</head>
<body><div class="container p-4 mt-4">
	<div class="row">
		<div class="col-12">
			<h3 class="text-center text-bold"><b>Subject List</b></h3>
		</div>
	</div>
	<table class="table table-sm table-hover table-bordered text-center">
		<thead>
			<tr>
					<th>Code</th>
					<th>Name</th>
					<th>Unit</th>
					<th>Option</th>
				</tr>
		</thead>
		<tbody>
				<?php
				$subjects = mysqli_query($db, "SELECT DISTINCT * FROM tblsubinfo");
					 while($sub = mysqli_fetch_assoc($subjects)){
				?>
			<tr>
					<td><?php echo $sub['SubCode'] ;?></td>
					<td><?php echo $sub['SubName'] ;?></td>
					<td><?php echo $sub['SubUnit'] ;?></td>
					<td>Option</td>
			</tr>
					<?php } ?>
		</tbody>
	</table>
</body>
</html>