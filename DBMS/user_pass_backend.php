<html>
<head>
  <meta charset="UTF-8">
  <title>Password Backend</title>
  
  
  
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
$old_password = $_POST["old_password"];
$old_password = md5($old_password);

$new_password = $_POST["new_password"];
$new_password = md5($new_password);

$email = $_SESSION['email_id'];
// $query = "SELECT * FROM APPLICANT_ WHERE email_id='$email'";
$query = "SELECT * FROM consumer WHERE user_id='$email' AND password='$old_password'";
$result = mysqli_query($con, $query);
$numResults = mysqli_num_rows($result);
// echo $years;
if($numResults == 0)
{
	echo "<br><br><br><center><h1>Invalid Password, Account will now be logged out.</h1></center>";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=index.php\" />";
}
else
{
	$query = "UPDATE consumer SET password = '$new_password' WHERE user_id='$email' AND password='$old_password' ";
	mysqli_query($con, $query);
	echo "<br><br><br><center><h1>Password Changed!</h1></center>";
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
