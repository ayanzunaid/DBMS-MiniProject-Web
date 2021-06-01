<html>
<head>
	<meta charset="UTF-8">
	<title>New Listing</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<h1>New Listing</h1>
			<form class="form" action = "org_new_listing_backend.php" method = "POST">
            
			  Services:
				<select id="Services" name="Services" required>
					<option value="">--Select Service--</option>
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
            Duration: <input name = "duration" placeholder = "service duration" required><br><br>          
            Open Date: <input name = "start" type = "datetime-local"><br><br>			
			Close Date: <input name = "end" type = "datetime-local"><br><br>			

            <!-- <input name = "email" placeholder = "Email/Registration ID"><br><br> -->
			<button type = "submit">Submit</button>
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
</body>
</html>
