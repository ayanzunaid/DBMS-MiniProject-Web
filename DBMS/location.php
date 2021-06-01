<html>
<head>
	<meta charset="UTF-8">
	<title>Add Location</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
<?php
require_once 'dbconnect.php';
session_start();
$email = $_SESSION['email_id'];
$query = "SELECT * FROM servicing_locations WHERE provider_id='$email'";
$result = mysqli_query($con, $query);
// $row = mysqli_fetch_assoc($result);
$numResults = mysqli_num_rows($result);
$_SESSION['num_loc'] = $numResults;
?>
<!-- echo $row['date_of_birth'];
echo "<html><body><br><br><center><h3>Edit Profile</h3><form action = \"mobile.php\" method = \"POST\">Name: <input name = \"name\" value = \"{$row['username']}\"><br><br>Date Of Birth: <input name = \"date_of_birth\" value = \"{$row['date_of_birth']}\" type = \"date\"><br><br>Current Role: <input name = \"curr_role\" value = \"{$row['role']}\"><br><br><button type = \"Update\">Submit</button></form></center></body></html>";
?>
 -->
 	<div class="wrapper">
	<div class="container">
	<br><br>
	<center>
		<h3>Locations</h3>
		<form action = "location_backend.php" method = "POST">
			<?php
				$counter = 1;
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					// echo "\"{$row['mobile_no']}\"";
					echo "Location {$counter}: <input name = \"Location_{$counter}\"  maxlength = 6 pattern = \"[0-9]{6}\" value = \"{$row['pin']}\"><br><br>";
					$counter++;
				}

			?>
			Add New: <input name = "new" placeholder = "pin code"  maxlength = 6 pattern = \"[0-9]{6}\" required><br><br>
			<button type = "submit">Submit</button>
		</form>
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
