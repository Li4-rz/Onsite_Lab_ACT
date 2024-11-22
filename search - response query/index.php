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
	<title></title>
</head>
<body>
	<?php if(isset($_SESSION['message'])) {?>
		<h1 style="color: green; text-align: center; background-color: ghostwhite; border-style: solid;">
			<?php echo $_SESSION['message']; ?>
		</h1>
	<?php } unset($_SESSION['message']); ?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
		<input type="text" name="searchInput" placeholder="Search Here">
		<input type="submit" name="searchBtn">
	</form>
	<table style="width: 100%; margin-top: 20px;">
		<tr>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Address</th>
			<th>Nationality</th>
			<th>Date Added</th>
			<th>Action</th>
		</tr>
		<?php if (!isset($_GET['searchBtn'])) {?>
			<?php $getAllApplicants = getAllApplicants($pdo); ?>
			<?php foreach ($getAllApplicants as $row) { ?>
				<tr>
					<td><?php echo $row['last_name'] ?></td>
					<td><?php echo $row['first_name'] ?></td>
					<td><?php echo $row['email'] ?></td>
					<td><?php echo $row['gender'] ?></td>
					<td><?php echo $row['address'] ?></td>
					<td><?php echo $row['nationality'] ?></td>
					<td><?php echo $row['date_added'] ?></td>
					<td>
						<a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
						<a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
					</td>
				</tr>
			<?php }?>
		<?php } else {?>
			<?php $searchForAApplicant = searchForAApplicant($pdo, $_GET['searchInput']); ?>
			<?php foreach ($searchForAApplicant as $row) {?>
				<tr>
					<td><?php echo $row['last_name'] ?></td>
					<td><?php echo $row['first_name'] ?></td>
					<td><?php echo $row['email'] ?></td>
					<td><?php echo $row['gender'] ?></td>
					<td><?php echo $row['address'] ?></td>
					<td><?php echo $row['nationality'] ?></td>
					<td><?php echo $row['date_added'] ?></td>
					<td>
						<a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
						<a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
		<?php } ?>
	</table>
</html>