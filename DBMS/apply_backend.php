<html>
<head>
	<meta charset="UTF-8">
	<title>Applied</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<br><br>
	<center>
		<div class="wrapper">
		<div class="container">
        <h3></h3><br><br>
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
$user_id=$_POST['user_id'];
$service_name = $_POST['service_name'];
$list_date= date('Y-m-d H:i:s', strtotime($_POST["list_date"]));
$open_date= date('Y-m-d H:i:s', strtotime($_POST["open_date"]));
$close_date= date('Y-m-d H:i:s', strtotime($_POST["close_date"]));
$servicing_date= date('Y-m-d H:i:s', strtotime($_POST["servicing_date"]));
if ($servicing_date  > $close_date || $servicing_date < $open_date)
	echo "<br><br><br><center><h1>please select a servicing date from the customer specified period.</h1></center>";
else
{
$servicing_charge=$_POST['servicing_charge'];
$email = $_SESSION['email_id'];
// $query = "SELECT * FROM APPLICANT_ WHERE email_id='$email'";
$query = "INSERT INTO applies VALUES('$email', '$user_id','$service_name', '$list_date' , '$servicing_date','$servicing_charge')";  
mysqli_query($con, $query) ;

echo "<br><br><br><center><h1>Applied!</h1></center>";
}
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