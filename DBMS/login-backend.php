<html>
<head>
	<meta charset="UTF-8">
	<title>Login Backend</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>

<body>
	<br><br>
	<center>
		<div class="wrapper">
		<div class="container">

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
$email = $_POST["email"];
$password = $_POST["password"];

$password = md5($password);
echo $_POST['radio'];
if($_POST['radio'] == "Service_Men")
{
	$query = "SELECT * FROM serviceman WHERE provider_id='$email' AND password='$password'";	
	$result = mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$_SESSION['email_id'] = $email;
	$numResults = mysqli_num_rows($result);
	if($numResults == 1)
	{
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=home.php\" />";
	}
	else
	{
		echo "<br><br><br><center><h1>Invalid credentials!</h1></center>";
		echo "<form action=\"index.php\">
			<button type=\"submit\">Go Back</button>
        </form>";	
	}
}
else
{
	$query = "SELECT * FROM consumer WHERE user_id='$email' AND password='$password'";
	echo $query;
	$result = mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$_SESSION['email_id'] = $email;
	$numResults = mysqli_num_rows($result);
	if($numResults == 1)
	{
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=org_home.php\" />";
	}
	else
	{
		echo "<br><br><br><center><h1>Invalid credentials!</h1></center>";
		echo "<form action=\"index.php\">
			<button type=\"submit\">Go Back</button>
        </form>";	
	}
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
	</center>
</body>
</html>
