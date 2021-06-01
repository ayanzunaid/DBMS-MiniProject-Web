<html>
<head>
	<meta charset="UTF-8">
	<title>Applicants</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<div class="wrapper">
		<div class="container">
        <h1>Applicants</h1>
        <?php
        /*
        $host = "localhost";
        $user = "USER_NAME";
        $dbpass = "PASSWORD";
        $dbname = "DB_NAME";
        $con = mysqli_connect($host,$user,$dbpass,$dbname);
        */
        require_once 'dbconnect.php';
        session_start();
        $user_id = $_SESSION["email_id"];
        $query = "SELECT * FROM applies, service_listing WHERE applies.user_id = service_listing.user_id AND
            		applies.list_date = service_listing.list_date AND applies.service_name = service_listing.service_name 
					  AND applies.user_id = '$user_id'  AND service_listing.close_date > NOW() AND service_listing.alloted = 0";
        $result = mysqli_query($con, $query);
        $numResults = mysqli_num_rows($result);
        // echo $years;
        if($numResults == 0){
            echo "<br><br><br><center><h1>No Applicants Found<br></h1>";
            echo "<form class=\"form\" action = \"org_new_listing.php\">
            <button type=\"submit\">Click here to add new service listings </button></form>";
        }
        else{
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
            $email_applicant = $row['provider_id'];
            $query2 = "SELECT * FROM serviceman WHERE provider_id = '".$row['provider_id']."'";	//TODO: Sorting
            $query_result2 = mysqli_query($con, $query2);
            $result2 = mysqli_fetch_array($query_result2, MYSQLI_ASSOC);
			echo "<form class=\"form\" action = \"applicant_profile.php\" method = \"POST\">";
			echo "<button name=\"email\" value=\"'$email_applicant'\">";
            echo "Service Name: ".$row['service_name']."<br>";
            echo "Duration: ".$row['duration']."<br>";
            echo "Opened on: ".$row['open_date']."<br>";
            echo "Closed on: ".$row['close_date']."<br><br>";
            echo "Service Man: ".$result2['username']."<br>";
            echo "Servicing Charge: ".$row['servicing_charge']."<br>";
			echo "Servicing Date: ".$row['servicing_date']."<br><br>";
            
            echo "Click to see profile</button>";
            echo "</form>";
            
            echo "<br><br>";
            } 
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
	
</body>
</html>
