<?php include_once "navbar.php"; ?>
<form method="post">
	<div class="form-group">
		<label for="datetimepicker1">Date of Birth</label>
		<input type="date" class="form-control" id="datetimepicker1" placeholder="Birthday" name="bday" required>
	</div>
	<button type="submit" name="next" class="btn btn-primary px-4">Show</button>
</form>
<?php 
/*for year convertion*/
if (isset($_POST['next'])) {
	if (!empty($_POST['bday'])) {
		$date = $_POST['bday'];
		$date = strtotime($date);
		$date = date('Y-m-d', $date);
		echo $date;
	}
}
?>