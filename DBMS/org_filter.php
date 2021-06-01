<html>
<head>
	<meta charset="UTF-8">
	<title>Search Candidates</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<br><br>
	<center>
        <div class="wrapper">
            <div class="container">
                <h1>Search Candidates</h1>
                <form action = "org_filter_backend.php" method = "POST">
                    Enter the following details (Leave empty in case of no preference)<br><br>
                    Services that you require: 
					<select id="Service_select" input name = "service_name" placeholder = "Select the service requirement that you posted">
					<option value="None">--Select your given requirement--</option>
					<?php
					require "dbconnect.php";// Database connection
					//////////////////////////////
					session_start();
					$user_id = $_SESSION['email_id'];
					$sqli = "select service_name,list_date FROM service_listing WHERE user_id = '$user_id' AND close_date > NOW() AND alloted = 0";
					 $result = mysqli_query($con, $sqli);
					 $info = ' applied on : ';
					while ($row = mysqli_fetch_array($result)) {
					echo '<option>'.$row['service_name'] .$info .$row['list_date'].'</option>';
					}
 
					?>
					
					</select>
					<br><br>
                    
            <button type = "submit">Submit</button>
		</form>
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
