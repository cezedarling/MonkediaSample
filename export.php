<?php
session_start();
require ("config.php");

if(isset($_SESSION['SESS_LOGGEDIN']) == FALSE) {
	header("Location: " . $basedir . "login.php");
}

require ("db.php");

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Client_List.csv');

// create a file pointer connected to the output stream
// $output = fopen('php://output', 'w'); // Open for writing only;
$output = fopen('php://output', 'r+'); // Open for reading and writing;

// output the column headings
fputcsv($output, array(
    '#', 
    'Name', 
    'Date Created',
	'Last Updated' 
));

// FETCH THE DATA
$pullsql = "SELECT * FROM clients ORDER by id";
$pullresult = mysqli_query($db, $pullsql);

// loop over the rows, outputting them
while ($pullrow = mysqli_fetch_assoc($pullresult)) fputcsv($output, $pullrow);


?>