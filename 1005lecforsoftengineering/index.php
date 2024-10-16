<?php require_once 'core/dbConfig.php';?>
<?php require_once 'core/models.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h3>Welcome to the Employee Management System. Input ypur details here to register</h3>
    <form action="core/handleForms.php" method="POST">
        <p><label for="EID">Employee ID </label><input type="text" name="employeeid" id="EID"></p>
        <p><label for="FN">First Name </label><input type="text" name="firstName" id="FN"></p>
        <p><label for="LN">Last Name </label><input type="text" name="lastName" id="LN"></p>
        <p><label for="GNDR">Gender </label><input type="text" name="gender" id="GNDR"></p>
        <p><label for="AGE">Age </label><input type="text" name="age" id="AGE"></p>
        <p><label for="POTN">Position </label><input type="text" name="position" id="POTN"></p>
        <p><label for="TM">Team </label><input type="text" name="team" id="TM"></p>
        <p><label for="SPLTY">Specialty </label><input type="text" name="specialty" id="SPLTY"></p>
        <p><label for="SD">Start Date </label><input type="text" name="startdate" id="SD"></p>
        <input type="submit" name="insertNewEmployeeBtn">
    </form>
    <div class="superglobal">
        <a href="testGetVariable.php?employeeName=MarkPasuquin&position=Intern" class="index_a">Test Get Superglobal</a>
    </div>
    <table>
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Position</th>
            <th>Team</th>
            <th>Specialty</th>
            <th>Start Date</th>
        </tr>
        <?php $seeAllEmployeeRecords = seeAllEmployeeRecords($pdo); ?>
        <?php foreach ($seeAllEmployeeRecords as $row) { ?>
            <tr> 
                <td><?php echo $row['employee_id'];?></td>
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['last_name'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><?php echo $row['age'];?></td>
                <td><?php echo $row['position'];?></td>
                <td><?php echo $row['team'];?></td>
                <td><?php echo $row['specialty'];?></td>
                <td><?php echo $row['start_date'];?></td>
                <td>
                    <a href="editEmployees.php?employee_id=<?php echo $row['employee_id'];?>" class="index_a">Edit</a>
                    <a href="deleteEmployees.php?employee_id=<?php echo $row['employee_id'];?>" class="index_a">Delete</a>
                </td>
            </tr>
        <?php }?>
    </table>
</body>
</html>