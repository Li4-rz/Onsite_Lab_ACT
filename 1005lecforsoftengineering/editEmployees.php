<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php $getEmployeeById = getEmployeeByID($pdo, $_GET['employee_id']); ?>
    <form action="core/handleForms.php?employee_id=<?php echo $_GET['employee_id']; ?>" method="POST">
        <p>
            <input type="hidden" name="employee_id" value="<?php echo $_GET['employee_id']; ?>">
        </p>
        <p>
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" value="<?php echo $getEmployeeById['first_name'];?>">
        </p>
        <p>
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" value="<?php echo $getEmployeeById['last_name'];?>">
        </p>
        <p>
            <label for="gender">Gender</label>
            <input type="text" name="gender" value="<?php echo $getEmployeeById['gender'];?>">
        </p>
        <p>
            <label for="age">Age</label>
            <input type="text" name="age" value="<?php echo $getEmployeeById['age'];?>">
        </p>
        <p>
            <label for="position">Position</label>
            <input type="text" name="position" value="<?php echo $getEmployeeById['position'];?>">
        </p>
        <p>
            <label for="team">Team</label>
            <input type="text" name="team" value="<?php echo $getEmployeeById['team'];?>">
        </p>
        <p>
            <label for="specialty">Specialty</label>
            <input type="text" name="specialty" value="<?php echo $getEmployeeById['specialty'];?>">
        </p>
        <p>
            <label for="startdate">Start Date</label>
            <input type="text" name="startdate" value="<?php echo $getEmployeeById['start_date'];?>">
        </p>
        <input type="submit" name="editEmployeesBtn" value="Update Employee">
    </form>
</body>
</html>