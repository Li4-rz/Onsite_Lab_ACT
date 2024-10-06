<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th,td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    
    <?php
        //Php statement for No.5 Insertion of Records in Database
        /*$QUERY = "INSERT INTO s_employees (Employee_Id, First_Name, Last_Name, Role VALUES (?,?,?,?))";

        $stmt = $pdo->prepare($QUERY);

        $executeQuery = $stmt->execute([31, "P.", "Diddy", "Salesperson"]);

        if($ececuteQuery) {
                echo "Query Successfull!"
        } else {
            echo "Query Failed."*/

        //Php statement fr No.6 Deletion of Records in Database
        /*$QUERY = "DELETE FROM s_employees WHERE Employee_id = 31";

        $stmt = $pdo->prepare($QUERY);

        $executeQuery = $stmt->execute();

        if($ececuteQuery) {
                echo "Query Successfull!"
        } else {
            echo "Query Failed."*/
        
        //Php statment for No.7 Updating Records of Database
        /*$QUERY = "UPDATE s_employees SET First_Name = ?, Last_Name = ? WHERE Employee_id = 1";

        $stmt = $pdo->prepare($QUERY);

        $executeQuery = $stmt->execute(["LeFlop", "James"]);

        if($ececuteQuery) {
                echo "Update Successfull!"
        } else {
            echo "Query Failed."
        }*/
    ?>
    <!-- Table for No.8 -->
    <!-- 
    <h1>Sales Emplyees Table</h1>
    <table>
        <thead>
            <tr>
                <th>Employee_id</th>
                <th>First_Name</th>
                <th>Last_Name</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
    
            <?php
                //Php statement for No.8 putting database into HTML Values
                $sql = "SELECT Employee_id, First_Name, Last_Name, Role FROM s_employees";
                $stmt = $pdo->query($sql);
                $employees = $stmt->fetchAll();

                foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo htmlspecialchars($employee['Employee_id']); ?></td>
                    <td><?php echo htmlspecialchars($employee['First_Name']); ?></td>
                    <td><?php echo htmlspecialchars($employee['Last_Name']); ?></td>
                    <td><?php echo htmlspecialchars($employee['Role']); ?></td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table> -->
</body>
</html>
