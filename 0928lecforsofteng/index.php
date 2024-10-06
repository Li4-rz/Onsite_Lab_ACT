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
    </table>
</body>
</html>