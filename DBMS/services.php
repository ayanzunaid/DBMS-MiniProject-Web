<html>
<head>
	<meta charset="UTF-8">
	<title>Services</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<div class="wrapper">
		<div class="container">
	<br><br>
	<center>
		<h3>Select Services</h3>
		<form action = "services_backend.php" method = "POST">
			Services:
				<select id="Services" name="Services">
					<option value="None">--Select Skill--</option>
<?php

require "dbconnect.php";// Database connection
//////////////////////////////
 
$sqli = "SELECT service_name FROM services";
 $result = mysqli_query($con, $sqli);
while ($row = mysqli_fetch_array($result)) {
echo '<option>'.$row['service_name'].'</option>';
}
 
?>
 
			  </select><br><br>
			<button type = "submit">Add Service</button>
		</form>
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
