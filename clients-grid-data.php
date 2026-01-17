<?php
require __DIR__ . "/incs/bootstrap.php";

$database = new Database($dbConfig);
$clientRepository = new ClientRepository($database);

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'id', 
	1 =>'name'
);

// getting total number records without any search
$totalData = $clientRepository->countAll();
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$searchValue = '';
if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$searchValue = $requestData['search']['value'];
}

$totalFiltered = $clientRepository->countFiltered($searchValue); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$orderColumn = $columns[$requestData['order'][0]['column']];
$orderDirection = $requestData['order'][0]['dir'];
$start = (int) $requestData['start'];
$length = (int) $requestData['length'];

$clients = $clientRepository->fetchPaginated(
	$searchValue,
	$orderColumn,
	$orderDirection,
	$start,
	$length
);

$data = array();
foreach ($clients as $row) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = "<a href='view_client.php?id=" .$row["id"]. "' target='_self\'> VIEW</a>";
// 	$nestedData[] = $row["id"];
	$nestedData[] = $row["name"];
	
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
