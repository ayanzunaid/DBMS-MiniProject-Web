
<html>
<head>
	<meta charset="UTF-8">
	<title>Your Reviews</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<br><br>
	<center>
		<div class="wrapper">
		<div class="container">
		<h2>My Reviews</h2><br><br>
<?php

require_once 'dbconnect.php';
session_start();
$org_reg = $_SESSION["email_id"];
$query = "SELECT * FROM review,service_tasks,consumer WHERE service_tasks.user_id = review.user_id AND
  service_tasks.service_name = review.service_name AND service_tasks.list_date = review.list_date AND
   service_tasks.provider_id = review.provider_id  AND  
   consumer.user_id = service_tasks.user_id AND service_tasks.provider_id = '$org_reg'";
$result = mysqli_query($con, $query);
$numResults = mysqli_num_rows($result);

if($numResults == 0){
	echo "<br><br><br><center><h1>No Reviews Found<br></h1> </center>";

}
else{ 
    echo "<center><table> <tr><th>Service Name</th> <th>Servicing Date</th> <th>Address</th> <th>Customer</th><th>Comments</th><th>Rating</th></tr>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
	//$query2 = "SELECT org_name,rating FROM ORGANIZATION_ WHERE  org_reg = '".$row['org_reg']."'";	//TODO: Sorting
	//$query_result2 = mysqli_query($con, $query2);
	//$result2 = mysqli_fetch_array($query_result2, MYSQLI_ASSOC);
	echo "<tr><td>".$row['service_name']."</td>";
	echo "<td>".$row['servicing_date']."</td>";
	
	echo "<td>".$row['street_name']." ".$row['street_number']."<br>".$row['apt_number']."<br>".$row['city']
	."<br>".$row['state']."<br>".$row['pin']."</td>";
	echo "<td><a href = \"user_profle.php\">".$row['username']."</a></td>";
	echo "<td>".$row['comment']."</td>";
	echo "<td>".$row['rating']."</td>";
	
	echo "</tr>";
	} 
	echo "</table> </center>";
}

// echo $years;

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