<?php
include_once "../connect.php";
unset($_SESSION['StudentID']);
session_destroy();
?>
<script type="text/javascript">
	window.location = "../index.php";
</script>