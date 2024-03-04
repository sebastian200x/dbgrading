<?php 
include_once "navbar.php";
		$std = mysqli_fetch_assoc(mysqli_query($db, "SELECT Count(StdReg) AS regs FROM tblstd WHERE StdReg = '0'")); 
echo $std['regs'];
?>
