<?php
require_once 'core/handleForms.php';
require_once 'core/models.php';


$id = $_GET['id'] ?? null;


$id = null;
if ($id) {
    $getApplicantByID = getApplicantByID($pdo, $id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $id ? "Edit Applicant" : "Add Applicant"; ?></title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1><?php echo $id ? "Edit Teacher" : "Add Teacher"; ?>!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label>
			<input type="text" name="first_name" value="<?php echo $id ? $id['first_name'] : ''; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label>
			<input type="text" name="last_name" value="<?php echo $id ? $id['last_name'] : ''; ?>">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $id ? $id['email'] : ''; ?>">
		</p>
		<p>
			<label for="gender">Gender</label>
			<input type="text" name="gender" value="<?php echo $id ? $id['gender'] : ''; ?>">
		</p>
		<p>
			<label for="subjectSpecialty">Subject Specialty</label>
			<input type="text" name="nationality" value="<?php echo $id ? $id['nationality'] : ''; ?>">
		</p>
		<p>
			<!-- Hidden input to track teacher ID for editing -->
			<?php if ($id): ?>
				<input type="hidden" name="teacher_id" value="<?php echo $id['id']; ?>">
			<?php endif; ?>
			<input type="submit" name="editUserBtn" value="<?php echo $id ? "Save Changes" : "Add Applicant"; ?>">
		</p>
	</form>
</body>
</html>
