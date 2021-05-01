<?php

	session_start();
	$_SESSION ["regState"] = 1;
	header("location: ../index.php");
	exit();


?>

