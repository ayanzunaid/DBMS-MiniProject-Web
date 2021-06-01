<html>
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<br><br>
	<center>
		<div class="wrapper">
		<div class="container">
		<h1>Service Man Profile</h1><br><br>
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
$email = $_SESSION['email_id'];
// echo $email;
$query = "SELECT * FROM serviceman WHERE provider_id='$email'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$username=$row['username'];
$rating=$row['rating'];
echo "<h2>Name: $username<br><br><br>";
echo "<h2>Rating: $rating<br>";
$query_mobile = "SELECT * FROM serviceman_nos WHERE provider_id='$email'";
$result_mobile = mysqli_query($con, $query_mobile);
echo "<br><br><h2>Contact Information</h2><br>";
echo "<table> <tr><th>Mobile Number</th> </tr>";
while($row_mobile=mysqli_fetch_array($result_mobile,MYSQLI_ASSOC)){
	echo "<tr><td>".$row_mobile['mobile']."</td></tr>";
}
echo "</table>";

$query_service = "SELECT * FROM provides WHERE provider_id='$email'";
$result_service = mysqli_query($con, $query_service);
echo "<br><br><h2>Services Provided</h2><br>";
echo "<table> <tr><th>Service Name</th> </tr>";
while($row_service=mysqli_fetch_array($result_service,MYSQLI_ASSOC)){
	echo "<tr><td>".$row_service['service_name']."</td></tr>";
}
echo "</table>";

$query_location = "SELECT * FROM servicing_locations WHERE provider_id='$email'";
$result_location = mysqli_query($con, $query_location);
echo "<br><br><h2>Servicing Locations</h2><br>";
echo "<table> <tr><th>Pin Code</th> </tr>";
while($row_location=mysqli_fetch_array($result_location,MYSQLI_ASSOC)){
	echo "<tr><td>".$row_location['pin']."</td></tr>";
}
echo "</table>";

//TODO : List Jobs Applied For
$query_apply = "SELECT * FROM applies,service_listing ,consumer WHERE 
 applies.provider_id='$email' AND applies.user_id = service_listing.user_id  AND applies.service_name = service_listing.service_name
 AND consumer.user_id = service_listing.user_id AND applies.list_date = service_listing.list_date";
 
$result_apply = mysqli_query($con, $query_apply);
echo "<br><br><h2>Jobs Applied For</h2><br>";
echo "<table> <tr><th>User Name</th>  <th>Service Name</th> <th>Address</th> <th>Open Date</th> <th>Close Date</th> <th>Service Duration</th>
    <th>Servicing Charge</th> <th>Servicing Date</th></tr>";
while($row_apply=mysqli_fetch_array($result_apply,MYSQLI_ASSOC)){
	echo "<tr><td>".$row_apply['username']."</td>";
	echo "<td>".$row_apply['service_name']."</td>";
	echo "<td>".$row_apply['street_name']." ".$row_apply['street_number']."<br>".$row_apply['apt_number']."<br>".$row_apply['city']
	."<br>".$row_apply['state']."<br>".$row_apply['pin']."</td>";
	echo "<td>".$row_apply['open_date']."</td>";
	echo "<td>".$row_apply['close_date']."</td>";
	echo "<td>".$row_apply['duration']."</td>";
	echo "<td>".$row_apply['servicing_charge']."</td>";
	echo "<td>".$row_apply['servicing_date']."</td></tr>";
	
}
echo "</table>";



?>

<form action="home.php">
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