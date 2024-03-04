<?php
include "../connect.php";
unset($_SESSION['AdminID']);
session_destroy();
?>
<script type="text/javascript">
	window.location = "../index.php";
</script>