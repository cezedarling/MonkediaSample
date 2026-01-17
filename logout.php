<?php
	require __DIR__ . "/incs/bootstrap.php";

// 	session_unset("SESS_LOGGEDIN");
// 	session_unset("SESS_ID");
	
	session_destroy();

	
	header("Location: " . $basedir . "index.php");
?>
	
