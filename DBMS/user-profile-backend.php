<html>
<head>
  <meta charset="UTF-8">
  <title>User Profile Backend</title>
  
  
  
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
$name = $_POST["name"];
$street_name = $_POST["street_name"];
$street_num = $_POST["street_num"];
$apt_num = $_POST["apt_num"];
$city = $_POST["city"];
$state = $_POST["state"];
$pin = $_POST["pin"];
// $date_of_birth = $_POST["date_of_birth"];
// echo "'$date_of_birth'";
// echo strtotime($_POST["date_of_birth"]);
// echo "'$date_of_birth'";
$email = $_SESSION['email_id'];
// $email = 'test1@test';
$query = "SELECT * FROM consumer WHERE user_id='$email'";


$result = mysqli_query($con, $query);
$row=mysqli_fetch_array($result);

$numResults = mysqli_num_rows($result);

if($numResults == 1)
{
	$query = "UPDATE consumer SET username = '$name', street_name='$street_name', street_number='$street_num', apt_number='$apt_num', city='$city', state='$state', pin='$pin' WHERE user_id='$email'";
	mysqli_query($con, $query);
	echo "<br><br><br><center><h1>Profile Updated!</h1></center>";
	echo "<form action=\"org_home.php\">
      <button type=\"submit\">Go Back</button>
        </form>";

}
else
{
	echo "<br><br><br><center><h1>Please Login Again!</h1></center>";
	echo "<form action=\"index.php\">
      <button type=\"submit\">Go Back</button>
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
  </center>
</body>
</html>
