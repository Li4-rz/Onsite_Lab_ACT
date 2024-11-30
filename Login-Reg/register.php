<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<style>
		body {
			font-family: 'Arial', sans-serif;
			background-color: #f7f7f7;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			text-align: center;
		}

		h1 {
			color: #333;
			margin-bottom: 20px;
		}

		form {
			background-color: #fff;
			padding: 30px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			max-width: 400px;
			width: 100%;
		}

		p {
			margin-bottom: 20px;
			text-align: left;
		}

		label {
			display: block;
			font-weight: bold;
			color: #555;
			margin-bottom: 5px;
		}

		input[type="text"],
		input[type="password"] {
			width: 100%;
			padding: 15px;
			font-size: 1em;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-bottom: 10px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			border: none;
			padding: 15px 20px;
			font-size: 1.2em;
			cursor: pointer;
			border-radius: 4px;
			width: 100%;
			transition: background-color 0.3s;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}

		.success {
			color: green;
			font-size: 1.2em;
		}

		.error {
			color: red;
			font-size: 1.2em;
		}

		/* Responsive Design */
		@media (max-width: 768px) {
			form {
				width: 90%;
				padding: 20px;
			}
		}
	</style>
</head>
<body>
	<?php  
	if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
		if ($_SESSION['status'] == "200") {
			echo "<h1 class='success'>{$_SESSION['message']}</h1>";
		} else {
			echo "<h1 class='error'>{$_SESSION['message']}</h1>";	
		}
	}
	unset($_SESSION['message']);
	unset($_SESSION['status']);
	?>

	<form action="core/handleForms.php" method="POST">
		<h1>Register Here!</h1>

		<p>
			<label for="username">Username</label>
			<input type="text" name="username" required>
		</p>
		<p>
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" required>
		</p>
		<p>
			<label for="last_name">Last Name</label>
			<input type="text" name="last_name" required>
		</p>
		<p>
			<label for="password">Password</label>
			<input type="password" name="password" required>
		</p>
		<p>
			<label for="confirm_password">Confirm Password</label>
			<input type="password" name="confirm_password" required>
		</p>
		<p>
			<input type="submit" name="insertNewUserBtn" value="Register">
		</p>
	</form>
</body>
</html>
