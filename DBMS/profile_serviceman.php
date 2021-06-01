<!-- <html>
<body>
	<br><br>
	<center>
		<h3>Edit Profile</h3>
		<form action = "profile-backend.php" method = "POST">
			Name: <input name = "name" placeholder = "Name"><br><br>
			Date Of Birth: <input name = "date_of_birth" type = "date"><br><br>
			Current Role: <input name = "curr_role" placeholder = "Enter Current Role"><br><br>
			<button type = "Update">Submit</button>
		</form>
	</center>
</body>
</html>
 -->

 <?php
require_once 'dbconnect.php';
session_start();
$email = $_SESSION['email_id'];
$query = "SELECT * FROM serviceman WHERE provider_id='$email'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
// echo $row['date_of_birth'];
echo 
"
<html>
<head>
	<meta charset=\"UTF-8\">
	<title>Login Page</title>
	
	
	
		<link rel=\"stylesheet\" href=\"css/style.css\">

	
</head>


<body>
<br><br>
<center><h3>Edit Profile</h3>
<div class=\"wrapper\">
		<div class=\"container\">
		<h1>Edit Profile</h1>
		<form class = \"form\" action = \"profile-serviceman-backend.php\" method = \"POST\">
		Name: <input name = \"name\" value = \"{$row['username']}\"><br><br>
		
		<button type = \"Update\">Submit</button>
		</form>
		<form action=\"home.php\">
			<button type=\"submit\">Go Back</button>
        </form>
		</div>
		
		<ul class=\"bg-bubbles\">
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
"
;
?>
