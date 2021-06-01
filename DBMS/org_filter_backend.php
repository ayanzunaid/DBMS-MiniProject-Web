<html>
<head>
	<meta charset="UTF-8">
	<title>Service Offers</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<br><br>
	<center>
		<div class="wrapper">
		<div class="container">
		<h3>Service_Offers</h3><br><br>
		
		<form action = "#" method = "POST">
         Check down the list to see all those who have applied and choose the one with the best offer<br><br>
         Offers: 
		<select id="Offer" input name = "offer" placeholder = "Click to choose Offers">
		<option value="None">--Offers--</option>
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
$service_name = $_POST["service_name"];
$pieces=explode(" ",$service_name);
$user_id = $_SESSION['email_id'];

$listing_date=$pieces[4]." ".$pieces[5];
$list_date = date('Y-m-d H:i:s', strtotime($listing_date));


// $query = "SELECT * FROM APPLICANT_ WHERE email_id='$email'";
$query = "SELECT provider_id,servicing_charge,servicing_date FROM applies WHERE service_name='$pieces[0]' AND list_date='$list_date' AND user_id = '$user_id'";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)) {
echo '<option>Provider name : '.$row['provider_id'].' Date of service : '.$row['servicing_date'].' Service Charge: '.$row['servicing_charge'].' Service Name: '.$pieces[0].'</option> ';
}

echo '</select>';
echo "<input type = \"hidden\" name = \"list_date\" value = \" ".$list_date. " \" >";
//$numResults = mysqli_num_rows($result);

?>
<br><br>
<input type="submit" name="submit" value="Confirm" />

</form>

<?php



if(isset($_POST['offer'])){
require 'dbconnect.php';	
//echo $_POST['offer'];  // Displaying Selected Value

$parts=explode(" ",$_POST['offer']);

$provider_id=$parts[3];
$date_time_service=$parts[8]." ".$parts[9];
$servicing_date = date('Y-m-d H:i:s', strtotime($date_time_service));
$list_date  = date('Y-m-d H:i:s', strtotime($_POST['list_date']));

echo "<br><center><h1> ServiceMan Selected For Job!!</h1>";

echo $parts[0];

echo "<br>";

echo $provider_id;

echo "<br>";

echo $servicing_date."<br>";

$service_charge=$parts[12];

$user_id = $_SESSION['email_id'];

$service_name=$parts[15];

echo $service_name."</center><br>";


$query = "UPDATE service_listing SET alloted = 1 WHERE user_id = '$user_id' AND service_name = '$service_name' AND list_date = '$list_date'" ;
$result = mysqli_query($con, $query);

$query = "INSERT into service_tasks values ('$provider_id','$user_id','$service_name','$list_date','$servicing_date','$service_charge')" ;
$result = mysqli_query($con, $query);

//$query = "DELETE FROM applies where provider_id=\"$service_man_id\" AND user_id=\"$user_id\" AND service_name=\"$service_name\" AND servicing_date=\"$date_time_service\")" ;
//$result = mysqli_query($con, $query);


}
?>
			
<br><br>




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