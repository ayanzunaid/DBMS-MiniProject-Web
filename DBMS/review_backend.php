<html>
<head>
	<meta charset="UTF-8">
	<title>Review</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<br><br>
	<center>
		<div class="wrapper">
		<div class="container">
		<h1>Review</h1><br><br>
		
		<form action = "#" method = "POST">
		<br><br>
		<br><center><h1> Review Successfully Submitted</h1>
          

		<br><br>
		
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
$service_name = $_POST["service_name"];



$review = $_POST["subject"];

$pieces=explode(" ",$service_name);
$user_id = $_SESSION['email_id'];


$service_name=$pieces[0];

$listing_date=$pieces[4]." ".$pieces[5];
$list_date = date('Y-m-d H:i:s', strtotime($listing_date));

$sqli = "select provider_id FROM service_tasks WHERE user_id = '$user_id' AND list_date='$list_date' AND service_name='$service_name'";
$result = mysqli_query($con, $sqli);
$row = mysqli_fetch_array($result);

$provider_id=$row['provider_id'];
$rating=$_POST["rating"];
date_default_timezone_set("Asia/Kolkata");
$curr = date('Y-m-d H:i:s');

$query = "INSERT into review values ('$provider_id','$user_id','$service_name','$list_date','$curr','$review',$rating)";
$result = mysqli_query($con, $query);
$query = "UPDATE serviceman SET rating = (SELECT avg(rating) FROM review WHERE provider_id = '$provider_id') WHERE provider_id = '$provider_id'";



$result = mysqli_query($con, $query);

?>
<br><br>

</form>


<br><br>




<form action="org_home.php">
			<button type="submit">Go Back</button>
        </form>
				</div>                                 
		
		<ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	</center>
</body>
</html>