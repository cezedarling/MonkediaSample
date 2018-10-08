<?php
session_start();
require ("config.php");

if(isset($_SESSION['SESS_LOGGEDIN']) == FALSE) {
	header("Location: " . $basedir . "login.php");
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
<div class="container">

<a href="index.php"><img class="logo_img img-fluid mb-3 mb-lg-0" src="images/logo.png"/></a>
<h1>CeZe Sample</h1>
<h2>Client View</h2>
<?php
if(isset($_SESSION['SESS_LOGGEDIN']) == TRUE) {
	echo "<a href='logout.php'>logout</a>";
}
?>
<a href="index.php" class="btn btn-primary btn-xs float-right">Back</a>
<hr>

<h5>Client:</h5>

<?php
require ("db.php");
$id = $_GET['id'];
$viewquery = "SELECT * FROM clients WHERE id = $id LIMIT 1";
$viewresult = mysqli_query($db, $viewquery);
$viewrow = mysqli_fetch_assoc($viewresult);

echo "<p class=\"title\">Client ID: <span>" . $viewrow['id'] . "</span></p>";

echo "<p class=\"title\">Name: <span>" . $viewrow['name'] . "</span></p>";
        
require("incs/footer.php");
