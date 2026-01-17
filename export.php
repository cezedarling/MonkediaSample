<?php
require __DIR__ . "/incs/bootstrap.php";

$database = new Database($dbConfig);
$clientRepository = new ClientRepository($database);

if(isset($_SESSION['SESS_LOGGEDIN']) == FALSE) {
	header("Location: " . $basedir . "login.php");
}

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
$clients = $clientRepository->fetchAll();

// loop over the rows, outputting them
foreach ($clients as $pullrow) {
    fputcsv($output, $pullrow);
}


?>
