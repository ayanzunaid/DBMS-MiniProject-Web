<html>
<head>
	<meta charset="UTF-8">
	<title>Sign-Up Page</title>
	
	
	
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
	<div class="wrapper">
		<div class="container">
		<h1>Sign-Up</h1>
		<form class = "form" action = "signup-backend.php" method = "POST">
			<input name = "name" placeholder = "Name" required><br><br>
			<input name = "email" placeholder = "Email/Registration ID"  required><br><br>
			<input name = "Mobile_No" placeholder = "Mobile_No" maxlength = 10 pattern = "[0-9]{10}" title = "please enter 10 digit mobile number"  required><br><br>
			<input name = "password" type = "password" placeholder = "Password" required><br><br>
			<input type="submit" name="radio" value="Service_Men"><br>
			<input type="submit" name="radio" value="Consumer"><br><br>
			
			
			<!-- <button type = "submit">Submit</button> -->
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
	<!-- <br><br>
	<center>
		<h1>Signup</h1>
		<form action = "signup-backend.php" method = "POST">
			<input name = "name" placeholder = "Name"><br><br>
			<input name = "email" placeholder = "Email"><br><br>
			<input name = "password" type = "password" placeholder = "Password"><br><br>
			<button type = "submit">Submit</button>
		</form>
	</center> -->
</body>
</html>
