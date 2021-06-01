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
                <h1>Select the service to give review</h1>
                <form action = "review_backend.php" method = "POST">
					Select the service to give review<br><br>
                    Services that are fulfilled: 
					<select id="Service_select" input name = "service_name" placeholder = "Select the service requirement that you posted" required>
					<option value="">--Select your given requirement--</option>
					<?php
					require "dbconnect.php";// Database connection
					//////////////////////////////
					session_start();
					$user_id = $_SESSION['email_id'];
					//$user_id = "moin@gmail.com";
					$sqli = "select service_name,list_date FROM service_tasks WHERE user_id = '$user_id' AND servicing_date <= NOW()";
					 $result = mysqli_query($con, $sqli);
					 $info = ' applied on : ';
					 $info2= 'service provided by :';
					while ($row = mysqli_fetch_array($result)) {
					//echo '<option>'.$row['service_name'] .$info .$row['list_date'].$info2.$row['provider_id'].'</option>';
					echo '<option>'.$row['service_name'] .$info .$row['list_date'].'</option>';
					
					}
 
					?>
					
					
					
					
					</select>
					
					<br><br><br><br><br>
					
					<h2>Kindly give your review below :</h2> 
					
					<input type="text" name="subject" id="subject" value="">
					
					<br><br><br><br><br>
					
					<h2>Kindly give the rating out of 5 below :</h2> 
					<input type="number" name="rating" id="rating" min = "1" max = "5" required>
					<br><br>
                    
            <button type = "submit">Submit</button>
		</form>
		<form action="review.php">
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
