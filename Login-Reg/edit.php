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
    <style>
        body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
        color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
            font-size: 28px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }


        p {
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
        textarea,
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            form {
                padding: 15px;
            }

            input[type="submit"] {
                width: 100%;
                }
        }
    </style>
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
