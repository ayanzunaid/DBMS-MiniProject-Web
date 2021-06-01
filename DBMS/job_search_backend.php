<html>
<head>
	<meta charset="UTF-8">
	<title>Job Search Results</title>
	
	
	
		<link rel="stylesheet" href="css/style1.css">

	
</head>
<body>
	<br><br>
	<center>
		<div class="wrapper">
		<div class="container">
		<h3>Job Search Results</h3><br><br>
<?php

require_once 'dbconnect.php';
session_start();
$service_name = $_POST["service_name"];

$pin = $_POST["location"];
$query = "";
$email = $_SESSION['email_id'];
if(empty(trim($service_name)) && empty(trim($pin)) ){
	$query = "SELECT * FROM service_listing,consumer WHERE consumer.user_id = service_listing.user_id AND 
	          consumer.pin IN (SELECT pin FROM servicing_locations WHERE provider_id = '$email') AND 
			  service_listing.service_name IN (SELECT service_name FROM provides WHERE provider_id = '$email')
        			  AND service_listing.close_date > NOW() AND alloted = 0";
			  
}
else if (empty(trim($service_name)))
{
	$query = "SELECT * FROM service_listing,consumer WHERE consumer.user_id = service_listing.user_id AND 
	          consumer.pin = '$pin' AND 
			  service_listing.service_name IN (SELECT service_name FROM provides WHERE provider_id = '$email')
			  AND service_listing.close_date > NOW() AND alloted = 0";
	
}

else if (empty(trim($pin)))
{
	$query = "SELECT * FROM service_listing,consumer WHERE consumer.user_id = service_listing.user_id AND 
	          consumer.pin IN (SELECT pin FROM servicing_locations WHERE provider_id = '$email') AND 
			  service_listing.service_name = '$service_name' AND service_listing.close_date > NOW() AND alloted = 0";
	
}

else
{
	$query = "SELECT * FROM service_listing,consumer WHERE consumer.user_id = service_listing.user_id AND 
	          consumer.pin = '$pin' AND 
			  service_listing.service_name = '$service_name' AND service_listing.close_date > NOW() AND alloted = 0";
	
}


$result = mysqli_query($con, $query);
$numResults = mysqli_num_rows($result);

echo $query;
if($numResults == 0){
	echo "<br><br><br><center><h1>No Active jobs found matching given criteria.</h1></center>";
}
else{
	echo"	<html>
	<head>
		<meta charset=\"UTF-8\">
		<title>Login Page</title>
		
		
		
			<link rel=\"stylesheet\" href=\"css/style.css\">
	
		
	</head>
	
	
	<body>
	<br><br>
	<div class=\"wrapper\">
			<div class=\"container\">";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
	//$query2 = "SELECT org_name,rating FROM ORGANIZATION_ WHERE  org_reg = '".$row['org_reg']."'";	
	//$query_result2 = mysqli_query($con, $query2);
	//$result2 = mysqli_fetch_array($query_result2, MYSQLI_ASSOC);
	echo "

			<form action=\"apply.php\" method = POST>
			<input type = \"hidden\" name = \"user_id\" value = \"".$row['user_id']."\">
			<input type = \"hidden\" name = \"service_name\" value = \"".$row['service_name']."\">
			<input type = \"hidden\" name = \"list_date\" value = \"".$row['list_date']."\">
			<input type = \"hidden\" name = \"open_date\" value = \"".$row['open_date']."\">
			<input type = \"hidden\" name = \"close_date\" value = \"".$row['close_date']."\">
			<button type = \"submit\"" ;
			date_default_timezone_set("Asia/Kolkata");
			$curr = date('Y-m-d H:i:s');
			$end = date('Y-m-d H:i:s', strtotime($row["close_date"]));
			if (date("Y-m-d H:i:s", strtotime('+1 hours', strtotime($end)) ) < $curr  ) echo "disabled";
		echo">
	
	
	
		Customer: ".$row['username']."<br><br>
		Address: ".$row['street_name']."<br>
		         ".$row['street_number']."<br>
		         ".$row['apt_number']."<br>
		         ".$row['city']."<br>
		         ".$row['state']."<br>
		         ".$row['pin']."<br><br>
        Service Name:".$row['service_name']."<br>
        Duration:".$row['duration']."<br><br>		
		Opened on:".$row['open_date']."<br>
		Closed on:".$row['close_date']."<br><br><br>
		Click here to Apply	
		
		</button>
			</form>


";
	} 
	echo"	<form action=\"home.php\">
			<button type=\"submit\">Go Back</button>
        </form>
				</div>
			
	<ul class=\"bg-bubbles\">
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
</html>";
}
// echo $years;

?>


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