<?php
// DB CONECTION INFORMATION
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbdatabase = "monkedia";

$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
