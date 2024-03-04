<?php
include_once "../connect.php";
unset($_SESSION['ProfID']);
session_destroy();
?>
<script type="text/javascript">
	window.location = "../index.php";
</script>
?>