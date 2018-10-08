<?php
session_start();
require ("config.php");

if(isset($_SESSION['SESS_LOGGEDIN']) == TRUE) {
	header("Location: " . $basedir . "index.php");
	exit;
}
?>  
<!DOCTYPE HTML>  
<html lang="en">
<head>
<title>Ceze Sample</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<a href="index.php"><img class="logo_img img-fluid mb-3 mb-lg-0" src="images/logo.png"/></a>
<h1>CeZe Sample</h1>
<h2>LOGIN</h2>

<hr>
<?php
require("db.php");
	
	if($_POST['submit']) {
	
	if(($_POST['user'] == "") || ($_POST['password'] == "")) {
	$error = "Username and Password required!";
	}
		$loginsql = "SELECT * FROM users WHERE username = '" . $_POST['user'] . "' AND password = '" . md5($_POST['password']) . "'";
		$loginres =mysqli_query($db, $loginsql);
		$numrows = mysqli_num_rows($loginres);
		
				
		if($numrows == 1) {
			$loginrow = mysqli_fetch_assoc($loginres);
			
			$_SESSION['SESS_LOGGEDIN'] = $loginrow['username'] . $loginrow['id'];

// 			header("Location: " . $basedir . "index.php");
echo "<script>window.location.href = '" . $basedir . "'</script>";
// echo "<meta http-equiv='refresh' content='2;url=" . $basedir . "index.php'>";
		} else if ($loginrow['username'] != $_POST['user']) {
			$wronguser = "Wrong Username or Password!";
		}
	}

	if(isset($error)) {
		echo "<p class='text-center error'>" . $error . "</p>";
	}
	if(isset($wronguser)) {
		echo "<p class='text-center error'>" . $wronguser . "</p>";
	}
?>

	<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<table class="login">
		<tr>
			<td>Username</td>
			<td><input type="textbox" name="user"></td>
		</tr>
		
		
		<tr>
			<td>Password</td>
			<td><input type="password" name="password">
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Log in">
		</tr>		
	</table>
	</form>


<?php
require("incs/footer.php");
