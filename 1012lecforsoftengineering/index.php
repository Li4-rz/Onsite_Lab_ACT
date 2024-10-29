<?php require_once 'core/dbConfig.php';?>
<?php require_once 'core/models.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles.css">
    <style>
        .container {
            border: 1px solid #ddd;
            width: 50%;
            height: 200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }


        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.15);
        }


        .container h3, .container h2 {
            font-size: 1.1em;
            color: #333;
            margin: 8px 0;
        }


        .editAndDelete {
            float: right;
                margin-right: 20px;
        }


        .editAndDelete a {
            margin-left: 10px;
            color: #0073e6;
            font-weight: bold;
            text-decoration: none;
            font-size: 0.9em;
            transition: color 0.2s ease;
        }


        .editAndDelete a:hover {
            color: #005bb5;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Welcome to Web Dev Projects Management System. Add new Web Devs!</h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username">
        </p>
        <p>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName">
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName">
        </p>
        <p>
            <label for="dateOfBirth">Date of Birth</label>
            <input type="date" name="dateOfBirth">
        </p>
        <p>
            <label for="specialization">Specailization</label>
            <input type="text" name="specialization">
        </p>
        <input type="submit" name="insertWebDevBtn">
    </form>
    <?php $getAllWebDevs = getAllWebDevs($pdo); ?>
	<?php foreach ($getAllWebDevs as $row) { ?>
	<div class="container">
		<h3>Username: <?php echo $row['username']; ?></h3>
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Specialization: <?php echo $row['specialization']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete">
			<a href="viewprojects.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">View Projects</a>
			<a href="editwebdev.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">Edit</a>
			<a href="deletewebdev.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>