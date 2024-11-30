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
            color: #4CAF50;
            margin: 20px 0;
            font-size: 24px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        form p {
            margin: 15px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        select {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            height: 40px;
        }

        @media (max-width: 768px) {
            form {
                width: 90%;
                padding: 15px;
            }

            input[type="submit"] {
                width: 100%;
            }
        }
    </style>
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
