<html>
<head>
  <meta charset="UTF-8">
  <title>Signup Backend</title>
  
  
  
    <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <br><br>
  <center>
    <div class="wrapper">
    <div class="container">
<?php


/*$host = "localhost";
$user = "USER_NAME";
$dbpass = "PASSWORD";
$dbname = "DB_NAME";
$con = mysqli_connect($host,$user,$dbpass,$dbname);
*/
require_once 'dbconnect.php';

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$mob = $_POST["Mobile_No"];
$password = md5($password);
if($_POST['radio'] == "Service_Men")
{
    $query = "SELECT * FROM serviceman WHERE provider_id='$email'";
    $result = mysqli_query($con, $query);
    $numResults = mysqli_num_rows($result);
	
	$querya = "SELECT * FROM consumer WHERE user_id='$email'";
    $resulta = mysqli_query($con, $querya);
    $numResultsa = mysqli_num_rows($resulta);
    if($numResults == 1 || $numResultsa == 1)
    {
   	 echo "<br><br><br><center><h1>Already registered!</h1></center>";
   	 echo "<form action=\"index.php\">
      <button type=\"submit\">Go Back</button>
        </form>";

   	 // sleep(4);
    }
    else
    {
   	 $query = "INSERT INTO serviceman (provider_id, password, username) VALUES ('$email', '$password', '$name')";
	 
   	 mysqli_query($con, $query);
	  $query = "INSERT INTO serviceman_nos (provider_id, mobile) VALUES ('$email', '$mob')";
	 
   	 mysqli_query($con, $query);
   	 echo "<br><br><br><center><h1>Sign-up Complete!</h1></center>";
   	 echo "<form action=\"index.php\">
      <button type=\"submit\">Go Back</button>
        </form>";
   	 
    }
}
else
{
    $query = "SELECT * FROM consumer WHERE user_id='$email'";
    $result = mysqli_query($con, $query);
    $numResults = mysqli_num_rows($result);
	
	$query2 = "SELECT * FROM serviceman WHERE provider_id='$email'";
    $result2 = mysqli_query($con, $query2);
    $numResults2 = mysqli_num_rows($result2);
    if($numResults == 1 || $numResults2 == 1 )
    {
   	 echo "<br><br><br><center><h1>Already registered!</h1></center>";
   	 echo "<form action=\"index.php\">
      <button type=\"submit\">Go Back</button>
        </form>";

   	 // sleep(4);
    }
    else
    {
   	 $query = "INSERT INTO consumer (user_id, password, username) VALUES ('$email', '$password', '$name')";
   	 mysqli_query($con, $query);
	 $query = "INSERT INTO consumer_nos (user_id, mobile) VALUES ('$email', '$mob')";
   	 mysqli_query($con, $query);
   	 echo "<br><br><br><center><h1>Sign-up Complete!</h1></center>";
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

