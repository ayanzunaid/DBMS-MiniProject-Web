<!-- <html>
<body>
	<br><br>
	<center>
		<h3>Edit Profile</h3>
		<form action = "profile-backend.php" method = "POST">
			Name: <input name = "name" placeholder = "Name"><br><br>
			Address: <input name = "address" placeholder="New Address"><br><br>
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
$query = "SELECT * FROM consumer WHERE user_id='$email'";
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
		echo $email;
		<h1>Edit Profile</h1>
		<form class = \"form\" action = \"user-profile-backend.php\" method = \"POST\">
		Name: <input name = \"name\" value = \"{$row['username']}\"><br><br>
		Street_Name: <input name = \"street_name\" value = \"{$row['street_name']}\"><br><br>
		Street_Number: <input name = \"street_num\" value = \"{$row['street_number']}\"><br><br>
		Apt_Num: <input name = \"apt_num\" value = \"{$row['apt_number']}\"><br><br>
		City: <input name = \"city\" value = \"{$row['city']}\"><br><br>
		State: <input name = \"state\" value = \"{$row['state']}\"><br><br>
		Pin: <input name = \"pin\" maxlength = 6 pattern = \"[0-9]{6}\" value = \"{$row['pin']}\"><br><br>
		<button type = \"Update\">Submit</button>
		</form>
		<form action=\"org_home.php\">
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
