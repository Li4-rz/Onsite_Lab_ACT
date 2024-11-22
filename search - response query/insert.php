<?php
require_once 'core/handleForms.php';
require_once 'core/models.php';

// Fetch the applicant ID from the URL if available
$id = $_GET['id'] ?? null;
$applicant = null;

if ($id) {
    // Fetch applicant data by ID
    $applicant = getApplicantByID($pdo, $id);
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
    <h1><?php echo $id ? "Edit Applicant" : "Add Applicant"; ?></h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $applicant ? htmlspecialchars($applicant['first_name']) : ''; ?>" required>
        </p>
        <p>
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $applicant ? htmlspecialchars($applicant['last_name']) : ''; ?>" required>
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $applicant ? htmlspecialchars($applicant['email']) : ''; ?>" required>
        </p>
        <p>
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male" <?php echo $applicant && $applicant['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo $applicant && $applicant['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo $applicant && $applicant['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
            </select>
        </p>
        <p>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="<?php echo $applicant ? htmlspecialchars($applicant['address']) : ''; ?>" required>
        </p>
        <p>
            <label for="nationality">Nationality</label>
            <input type="text" id="nationality" name="nationality" value="<?php echo $applicant ? htmlspecialchars($applicant['nationality']) : ''; ?>" required>
        </p>
        <p>
            <!-- Hidden input to track applicant ID for editing -->
            <?php if ($id): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($applicant['id']); ?>">
            <?php endif; ?>
            <input type="submit" name="<?php echo $id ? 'editUserBtn' : 'insertUserBtn'; ?>" value="<?php echo $id ? "Save Changes" : "Add Applicant"; ?>">
        </p>
    </form>
</body>
</html>
