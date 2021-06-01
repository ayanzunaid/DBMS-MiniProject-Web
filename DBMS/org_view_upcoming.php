
<html>
<head>
	<meta charset="UTF-8">
	<title>Alloted Services</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<br><br>
	<center>
		<div class="wrapper">
		<div class="container">
		<h2>My Alloted Services</h2><br><br>
<?php

require_once 'dbconnect.php';
session_start();
$org_reg = $_SESSION["email_id"];
$query = "SELECT * FROM service_tasks ,service_listing WHERE service_tasks.user_id = service_listing.user_id AND
  service_tasks.service_name = service_listing.service_name AND service_tasks.list_date = service_listing.list_date AND
   service_listing.user_id = '$org_reg' AND service_listing.alloted = 1 AND service_tasks.servicing_date > NOW() ";
$result = mysqli_query($con, $query);
$numResults = mysqli_num_rows($result);

if($numResults == 0){
	echo "<br><br><br><center><h1>No Active Alloted Services Found<br></h1> </center>";

}
else{ 
    echo "<center><table> <tr><th>Service Name</th> <th>Servicing Date</th> <th>Duration</th> <th>Service Charge</th> <th>Serviceman</th></tr>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
	//$query2 = "SELECT org_name,rating FROM ORGANIZATION_ WHERE  org_reg = '".$row['org_reg']."'";	//TODO: Sorting
	//$query_result2 = mysqli_query($con, $query2);
	//$result2 = mysqli_fetch_array($query_result2, MYSQLI_ASSOC);
	echo "<tr><td>".$row['service_name']."</td>";
	echo "<td>".$row['servicing_date']."</td>";
	echo "<td>".$row['duration']."</td>";
	echo "<td>".$row['servicing_charge']."</td>";
	echo "<td><a href = \"provider_profle.php\">".$row['provider_id']."</a></td>";
	echo "</tr>";
	} 
	echo "</table> </center>";
}

// echo $years;

?>

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