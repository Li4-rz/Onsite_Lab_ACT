<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Applicant</title>
	<style>
		body {
    		font-family: 'Arial', sans-serif;
    		background-color: #f9f9f9;
    		margin: 0;
    		padding: 0;
    		color: #333;
    		text-align: center;
		}

		h1 {
    		color: #d9534f;
    		margin-top: 20px;
    		font-size: 24px;
		}

		.container {
    		max-width: 600px;
    		margin: 20px auto;
    		padding: 20px;
    		background-color: #ffcbd1;
    		border: 2px solid #d9534f;
    		border-radius: 8px;
    		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    		text-align: left;
		}

		.container h2 {
    		font-size: 18px;
    		color: #333;
    		margin: 10px 0;
		}

		.container h2 span {
    		font-weight: bold;
    		color: #d9534f;
		}

		.delete-btn {
    		text-align: right;
    		margin-top: 20px;
		}

		.delete-btn input[type="submit"] {
    		background-color: #d9534f;
    		color: white;
    		padding: 10px 20px;
    		border: none;
    		border-radius: 4px;
    		font-size: 16px;
    		cursor: pointer;
    		transition: background-color 0.3s ease;
		}

		.delete-btn input[type="submit"]:hover {
    		background-color: #c9302c;
		}

		@media (max-width: 768px) {
    		.container {
        		width: 90%;
        		padding: 15px;
    		}

    		.delete-btn {
        		text-align: center;
    		}
		}

	</style>
</head>

<body>
	<h1>Are you sure you want to delete this Applicant?</h1>
	<?php $getUserByID = getApplicantByID($pdo, $_GET['id']); ?>
	<div class="container">
		<h2>First Name: <span><?php echo $getUserByID['first_name']; ?></span></h2>
		<h2>Last Name: <span><?php echo $getUserByID['last_name']; ?></span></h2>
		<h2>Email: <span><?php echo $getUserByID['email']; ?></span></h2>
		<h2>Gender: <span><?php echo $getUserByID['gender']; ?></span></h2>

		<div class="delete-btn">
			<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
				<input type="submit" name="deleteUserBtn" value="Delete">
			</form>			
		</div>	
	</div>
</body>
</html>
