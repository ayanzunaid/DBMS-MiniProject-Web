<html>
<head>
	<meta charset="UTF-8">
	<title>Search Jobs</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<br><br>
	<center>
		<div class="wrapper">
		<div class="container">
		<h3>Job Search</h3>
		<form action = "job_search_backend.php" method = "POST">
			Enter the following details (Select Any in case of no preference)<br><br>
	   		 Service : <select name="service_name">
			 <option value="">Any</option>
	   		 <?php
	   		 require_once 'dbconnect.php';
			 session_start();
			 $email = $_SESSION['email_id'];
	   		 $sql = mysqli_query($con, "SELECT service_name FROM provides WHERE provider_id = '$email'") or die(mysql_error());
	   		 while ($row = $sql->fetch_assoc()){
	   		 //echo $row['service_name'];
   			 echo "<option value=\"{$row['service_name']}\">" . $row['service_name'] . "</option>";	   		 }
 	   		 //echo "No Preference";
   			   			 
	   		 ?>
	   		 </select><br><br>
			 
			 Location : <select name="location">
			 <option value="">Any</option>
	   		 <?php
	   		 require_once 'dbconnect.php';
			 session_start();
			 $email = $_SESSION['email_id'];
	   		 $sql = mysqli_query($con, "SELECT pin FROM servicing_locations WHERE provider_id = '$email'") or die(mysql_error());
	   		 while ($row = $sql->fetch_assoc()){
	   		 //echo $row['service_name'];
   			 echo "<option value=\"{$row['pin']}\">" . $row['pin'] . "</option>";	   		 }
 	   		 //echo "No Preference";
   			   			 
	   		 ?>
	   		 </select><br><br>
			 
   			
			<button type = "submit">Submit</button>
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
