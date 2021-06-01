<html>
<head>
  <meta charset="UTF-8">
  <title>Qualification Backend</title>
  
  
  
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
// $org = $_POST["org_reg"];
// echo $org;
$start = date('Y-m-d H:i:s', strtotime($_POST["start"]));
$end = date('Y-m-d H:i:s', strtotime($_POST["end"]));
date_default_timezone_set("Asia/Kolkata");
$curr = date('Y-m-d H:i:s');
//$role = $_POST["role"];
//$tag = $_POST["tag"];
$service = $_POST["Services"];
$org = $_SESSION['email_id'];
$duration = $_POST["duration"];

if ($end < $start)
{
	echo "<br><br><br><center><h1>Close date cannot be before Start date</h1></center>";
echo "<form action=\"org_home.php\">
      <button type=\"submit\">Go Back</button>
        </form>";
}
else if (date("Y-m-d H:i:s", strtotime('+1 hours', strtotime($start)) ) < $curr  )
{
echo "<br><br><br><center><h1>Start date cannot be a Past date</h1></center>";
echo "<form action=\"org_home.php\">
      <button type=\"submit\">Go Back</button>
        </form>";	
}
else {
$query = "INSERT INTO service_listing(user_id , service_name ,list_date ,duration ,
  open_date , close_date)  VALUES('$org', '$service' , '$curr' , '$duration', '$start', '$end')";
$result = mysqli_query($con, $query);


echo "<br><br><br><center><h1>Listing Added</h1></center>";
echo "<form action=\"org_home.php\">
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