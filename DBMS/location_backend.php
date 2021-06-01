<?php
/*
$host = "localhost";
$user = "USER_NAME";
$dbpass = "PASSWORD";
$dbname = "DB_NAME";
$con = mysqli_connect($host,$user,$dbpass,$dbname);
*/
require_once 'dbconnect.php';
session_start();
$number = $_POST["new"];
echo $number;
$email = $_SESSION['email_id'];
$query = "INSERT INTO servicing_locations VALUES('$email', '$number')";
$result = mysqli_query($con, $query);
?>
<meta http-equiv="refresh" content="0;URL=location.php" />;