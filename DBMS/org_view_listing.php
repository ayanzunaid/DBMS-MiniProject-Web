
<html>
<head>
	<meta charset="UTF-8">
	<title>My Listings</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<br><br>
	<center>
		<div class="wrapper">
		<div class="container">
		<h2>My Listings</h2><br><br>
<?php

require_once 'dbconnect.php';
session_start();
$org_reg = $_SESSION["email_id"];
$query = "SELECT * FROM service_listing WHERE  user_id = '$org_reg'";
$result = mysqli_query($con, $query);
$numResults = mysqli_num_rows($result);

if($numResults == 0){
	echo "<br><br><br><center><h1>No Listings Found<br></h1> </center>";

}
else{ 
    echo "<center><table> <tr><th>Service Name</th> <th>List Date</th> <th>Duration</th> <th>Open Date</th> <th>Close Date</th></tr>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
	//$query2 = "SELECT org_name,rating FROM ORGANIZATION_ WHERE  org_reg = '".$row['org_reg']."'";	//TODO: Sorting
	//$query_result2 = mysqli_query($con, $query2);
	//$result2 = mysqli_fetch_array($query_result2, MYSQLI_ASSOC);
	echo "<tr><td>".$row['service_name']."</td>";
	echo "<td>".$row['list_date']."</td>";
	echo "<td>".$row['duration']."</td>";
	echo "<td>".$row['open_date']."</td>";
	echo "<td>".$row['close_date']."</td>";
	echo "</tr>";
	} 
	echo "</table> </center>";
}
echo "<form class=\"form\" action = \"org_new_listing.php\">
<input type=\"submit\" name=\"xyz\" value=\"Click here to add\"></form>";
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