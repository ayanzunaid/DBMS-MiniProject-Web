<html>
<head>
  <meta charset="UTF-8">
  <title>Services Backend</title>
  
  
  
    <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <br><br>
  <center>
    <div class="wrapper">
    <div class="container">
<?php
require 'dbconnect.php';
session_start();
$services = $_POST['Services'];
$email = $_SESSION['email_id'];

$query = "INSERT INTO provides VALUES('$email', '$services')";
$query2 = "SELECT * FROM provides WHERE provider_id = '$email' AND service_name = '$services'";
$result2 = mysqli_query($con, $query2);
// $row = mysqli_fetch_assoc($result);
$numResults = mysqli_num_rows($result2);
 if ($numResults == 1)
 {
	echo "<br><br><br><center><h1>Skill Already Added!</h1></center>";
	echo "<form action=\"home.php\">
      <button type=\"submit\">Go Back</button>
        </form>";
 }
else{
$result = mysqli_query($con, $query);

echo "<br><br><br><center><h1>Skill Added!</h1></center>";
echo "<form action=\"home.php\">
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