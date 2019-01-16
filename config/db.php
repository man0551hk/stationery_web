<?php
$hostName = "localhost";
$dbName = "sq_stationery";
$userName = "root";
$password = "root";

$hostName = "localhost";
$dbName = "sq_stationery";
$userName = "sq_stationery";
$password = "Hkjh17&4";

$link = mysqli_connect($hostName, $userName, $password, $dbName);
mysqli_query($link, "SET NAMES 'utf8'");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
  
?>
