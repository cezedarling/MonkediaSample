<?php
require __DIR__ . "/incs/bootstrap.php";

$database = new Database($dbConfig);
$clientRepository = new ClientRepository($database);

if(isset($_SESSION['SESS_LOGGEDIN']) == FALSE) {
	header("Location: " . $basedir . "login.php");
}
?> 
<!DOCTYPE HTML>  
<html lang="en">
<head>
<title>Sample</title>
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
<h1>Sample</h1>
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
$id = (int) $_GET['id'];
$viewrow = $clientRepository->findById($id);

if ($viewrow) {
	echo "<p class=\"title\">Client ID: <span>" . $viewrow['id'] . "</span></p>";

	echo "<p class=\"title\">Name: <span>" . $viewrow['name'] . "</span></p>";
} else {
	echo "<p class=\"title\">Client not found.</p>";
}
        
require("incs/footer.php");
