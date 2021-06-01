<?php
$service=$_POST['service_name'];
$user_id=$_POST['user_id'];
$list_date=$_POST['list_date'];
$open_date=$_POST['open_date'];
$close_date=$_POST['close_date'];
 
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Apply</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<div class="wrapper">
		<div class="container">
			
			<?php
			 require_once 'dbconnect.php';
			 session_start();
			 $email = $_SESSION['email_id'];
			 $query = "SELECT * FROM applies WHERE provider_id = '$email' AND user_id = '$user_id' AND service_name = '$service' AND list_date = '$list_date'";
			 
			 $result = mysqli_query($con, $query);
			 $numResults = mysqli_num_rows($result);	
			 if ($numResults !=0) 
			 {
				 echo "<br><br><br><center><h1>Already Applied For job!</h1></center>";
				 echo"	<form action=\"home.php\">
				<button type=\"submit\">Go Back</button>
					</form>";
			 }
		 else {
			echo "<h1>Apply</h1> Applying for the service of $service for user  $user_id <br><br>
			<form class=\"form\" action = \"apply_backend.php\" method = \"POST\">
			<input type= \"hidden\" name = \"user_id\" value=\"".$user_id."\">
			<input type= \"hidden\" name = \"service_name\" value=\"".$service."\">
			<input type= \"hidden\" name = \"list_date\" value=\"".$list_date."\">
			<input type= \"hidden\" name = \"open_date\" value=\"".$open_date."\">
			<input type= \"hidden\" name = \"close_date\" value=\"".$close_date."\">
			Servicing Date:<br>
			<input type= \"datetime-local\" name = \"servicing_date\">
			<br>Servicing Charge:<br>
			<input type= \"number\" name = \"servicing_charge\">
			<br><br>
			<button type = \"submit\">Submit</button>
			</form>";
		 }
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
</body>
</html>

