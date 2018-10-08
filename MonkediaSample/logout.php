<?php
	session_start();
	require ("config.php");

	session_unset("SESS_LOGGEDIN");
	
	header("Location: " . $basedir . "login.php");
?>
	
