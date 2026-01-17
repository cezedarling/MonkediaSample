<?php
require __DIR__ . "/incs/bootstrap.php";

$database = new Database($dbConfig);
$auth = new Auth($database);

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
<h1>Sample</h1>
<h2>LOGIN</h2>

<hr>
<?php
if(isset($_POST['submit'])) {
	if( (empty($_POST['user'])) || (empty($_POST['password'])) ) {
	$error = "Username and Password required!";
	} else if (!empty($_POST['user'])) {
		$user = $auth->attemptLogin($_POST['user'], $_POST['password']);
						
		if($user !== null) {
			$_SESSION['SESS_LOGGEDIN'] = $user['username']; 
			$_SESSION['SESS_ID'] = $user['id'];
			
			header("Location: " . $basedir . "index.php");
// echo "<script>window.location.href = '" . $basedir . "'</script>";
		} else {
			$wronguser = "Wrong Username or Password!";
		}
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
