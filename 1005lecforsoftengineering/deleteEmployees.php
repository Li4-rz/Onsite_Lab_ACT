<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Are You sure you want to delete this user?</h1>
    <?php 
    $employee_id = isset($_GET['employee_id']) ? $_GET['employee_id'] : null;

    if($employee_id) {
        $employee = getEmployeeByID($pdo, $employee_id);

        if($employee) {
            $first_name = htmlspecialchars($employee['first_name']);
            $last_name = htmlspecialchars($employee['last_name']);
            $gender = htmlspecialchars($employee['gender']);
            $age = htmlspecialchars($employee['age']);
            $position = htmlspecialchars($employee['position']);
            $team = htmlspecialchars($employee['team']);
            $specialty = htmlspecialchars($employee['specialty']);
            $start_date = htmlspecialchars($employee['start_date']);
        }
    } else {
        echo "<p>Invalid employee ID.</p>";
        exit;
    }
    ?>
    <form action="core/handleForms.php?employee_id=<?php echo htmlspecialchars($employee_id); ?>" method="POST">

        <div class="employeeContainer">
            <p>First Name: <?php echo $first_name;?></p>
            <p>Last Name: <?php echo $last_name;?></p>
            <p>Gender: <?php echo $gender;?></p>
            <p>Age: <?php echo $age;?></p>
            <p>Position: <?php echo $position;?></p>
            <p>Team: <?php echo $team;?></p>
            <p>Specialty: <?php echo $specialty;?></p>
            <p>Start Date: <?php echo $start_date;?></p>
            <input type="submit" name="deleteEmployeeBtn" value="Delete">
        </div>
    </form>
</body>
</html>