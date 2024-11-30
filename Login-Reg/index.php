<?php
    require_once 'core/models.php';
    require_once 'core/handleForms.php';

	if (!isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Applicant Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
        }
        .message {
            text-align: center;
            padding: 10px;
            margin: 20px;
            border-radius: 5px;
        }
        .message.green {
            color: green;
            background-color: #eaffea;
            border: 1px solid green;
        }
        .message.red {
            color: red;
            background-color: #ffeaea;
            border: 1px solid red;
        }
        form {
            text-align: center;
            margin: 20px;
        }
        form input[type="text"] {
            padding: 8px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form input[type="submit"] {
            padding: 8px 15px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .greeting {
            margin: 20px;
            text-align: center;
        }
        .greeting h1 {
            margin-bottom: 10px;
        }
        .greeting a {
            color: #007bff;
            text-decoration: none;
        }
        .greeting a:hover {
            text-decoration: underline;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        p {
            text-align: center;
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        table td a {
            margin: 0 5px;
            padding: 5px 10px;
            border: 1px solid #007bff;
            color: #007bff;
            border-radius: 4px;
            text-decoration: none;
        }
        table td a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="message green">
            <?php echo $_SESSION['message']; ?>
        </div>
    <?php } unset($_SESSION['message']); ?>
    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <input type="text" name="searchInput" placeholder="Search Here">
        <input type="submit" name="searchBtn" value="Search">
    </form>

    <div class="greeting">
        <h1>Hello there! Welcome, <?php echo $_SESSION['username']; ?></h1>
        <h1><a href="core/handleForms.php?logoutUserBtn=1">Logout</a></h1>    
    </div>

    <p><a href="index.php">Clear Search Query</a></p>
    <p><a href="insert.php">Insert New Applicant</a></p>

    <table>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Nationality</th>
            <th>Added By</th>
            <th>Date Added</th>
            <th>Last Updated By</th>
            <th>Last Updated</th>
            <th>Action</th>
        </tr>
        <?php if (!isset($_GET['searchBtn'])) { ?>
            <?php $getAllApplicants = getAllApplicants($pdo); ?>
            <?php foreach ($getAllApplicants as $row) { ?>
                <tr>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['nationality'] ?></td>
                    <td><?php echo $row['added_by']?></td>
                    <td><?php echo $row['date_added'] ?></td>
                    <td><?php echo $row['last_updated_by'] ?></td>
                    <td><?php echo $row['last_update'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <?php $searchForAApplicant = searchForAApplicant($pdo, $_GET['searchInput']); ?>
            <?php foreach ($searchForAApplicant as $row) { ?>
                <tr>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['nationality'] ?></td>
                    <td><?php echo $row['added_by']?></td>
                    <td><?php echo $row['date_added'] ?></td>
                    <td><?php echo $row['last_updated_by'] ?></td>
                    <td><?php echo $row['last_update'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </table>
</body>
</html>
