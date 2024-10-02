<?php
	session_start();

	$_User = '';
	$_Pass = '';
	
	//For Loggin in
	if(isset($_POST['LoginBTN'])){
		
		// Check if someone is already logged in
		if(isset($_SESSION['logged_in_user'])){
			// If someone is logged in notify the new user
			$_message = '<p><b>' . htmlspecialchars($_SESSION['logged_in_user']) . ' is already logged in. Please wait for them to log out.</b></p>';
		} else {
			// Get Username
			$_User = $_POST['Username'];

			// Get Password and hash it
			$_Pass = password_hash($_POST['Password'], PASSWORD_DEFAULT);

			// Store username and Password 
			$_SESSION['logged_in_user'] = $_User;
			$_SESSION['logged_in_password'] = $_Pass;

			// Display username and password
			$_message =  '<p><b>User logged in: ' . htmlspecialchars($_User) . '</b></p>';
			$_message .= '<p><b>Password: ' . htmlspecialchars($_Pass) . '</b><p>';
		}
	}

	//For Logout Button
	if(isset($_GET['logout'])){
		session_unset();
		session_destroy();
		$_User = '';
		$_Pass = '';
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="index.php" method="POST">
		<label for="Username">Username </label>
		<input type="text" name="Username" id="Username" required>
		<br>
		<br>
		<label for="Password">Password </label>
		<input type="password" name="Password" id="Password" required>
		<br>
		<br>
		<input type="submit" value="Login" name="LoginBTN">
	</form>
	<br>
	<a href="index.php?logout=true">
		<button>Logout</button>
	</a>

	<?php if(isset($_message)){
		echo $_message;
	}
	?>
</body>
</html>