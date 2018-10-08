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
  
	<!--// //--> 
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" >
		$(document).ready(function() {
			var dataTable = $('#clients-grid').DataTable( {
				"processing": true,
				"serverSide": true,
				"ajax":{
					url :"clients-grid-data.php", // json datasource
					type: "post",  // method  , by default get
					error: function(){  // error handling
						$(".clients-grid-error").html("");
						$("#clients-grid").append('<tbody class="clients-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
						$("#clients-grid_processing").css("display","none");
					
					}
				}
			} );
		} );
	</script>
	<!--// //--> 

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a href="index.php"><img class="logo_img img-fluid mb-3 mb-lg-0" src="images/logo.png"/></a>
<h1>CeZe Sample</h1>
<h2>Clients View</h2>
<a href="export.php" class="btn btn-default btn-changer" target="_self">Download Clients List</a>
<?php
if(isset($_SESSION['SESS_LOGGEDIN']) == TRUE) {
	echo "<a href='logout.php'>logout</a>";
}
?>
<hr>

<!-- 		<div class="container"> -->
		<div>
			<table id="clients-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
						</tr>
					</thead>
			</table>
		</div>
<?php
require("incs/footer.php");
