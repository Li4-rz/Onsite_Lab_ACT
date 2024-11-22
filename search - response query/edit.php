<?php 
require_once 'core/handleForms.php'; 
require_once 'core/models.php'; 

// Fetch applicant data based on ID
$id = $_GET['id'] ?? null; // Ensure `id` is set
if ($id) {
    $getUserByID = getApplicantByID($pdo, $id);
    if (!$getUserByID) {
        echo "Error: Applicant not found!";
        exit();
    }
} else {
    echo "Error: No applicant ID provided!";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Applicant</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit the Applicant</h1>
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <p>
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="first_name" value="<?php echo htmlspecialchars($getUserByID['first_name']); ?>" required>
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="last_name" value="<?php echo htmlspecialchars($getUserByID['last_name']); ?>" required>
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($getUserByID['email']); ?>" required>
        </p>
        <p>
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="Male" <?php echo $getUserByID['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo $getUserByID['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo $getUserByID['gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
            </select>
        </p>
        <p>
            <label for="address">Address</label>
            <textarea id="address" name="address" required><?php echo htmlspecialchars($getUserByID['address'] ?? ''); ?></textarea>
        </p>
        <p>
            <label for="nationality">Nationality</label>
            <input type="text" id="nationality" name="nationality" value="<?php echo htmlspecialchars($getUserByID['nationality']); ?>" required>
        </p>
        <p>
            <input type="submit" value="Save Changes" name="editUserBtn">
        </p>
    </form>
</body>
</html>
