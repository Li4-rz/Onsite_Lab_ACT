<?php

    require_once 'dbConfig.php';

    function insertIntoEmployeeRecords($pdo, $employeeid, $firstName, $lastName, $gender, $age, $position, $team, $specialty, $start_date){

        $sql = "INSERT INTO employees ( employee_id, first_name, last_name, gender, age, position, team, specialty, start_date) VALUES (?,?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $exequteQuery = $stmt->execute([$employeeid, $firstName, $lastName, $gender, $age, $position, $team, $specialty, $start_date]);

        if($exequteQuery){
            return true;
        }

    }


    function seeAllEmployeeRecords($pdo) {
        
        $sql = "SELECT * FROM employees";

        $stmt = $pdo->prepare($sql);

        $exequteQuery = $stmt->execute();

        if ($exequteQuery){
            return $stmt->fetchAll();
        }
    }


    function getEmployeeByID($pdo, $employee_id) {

        $sql = "SELECT * FROM employees WHERE employee_id =?";

        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$employee_id])) {
            return $stmt->fetch();
        }
    }


    function updateAEmployee($pdo, $employee_id, $first_name, $last_name, $gender, $age, $position, $team, $specialty, $start_date) {

        $sql = "UPDATE employees 
                    SET first_name = ?,
                        last_name = ?,
                        gender = ?,
                        age = ?,
                        position = ?,
                        team = ?,
                        specialty = ?,
                        start_date = ?
                WHERE employee_id = ?";

        $stmt = $pdo->prepare($sql);

        $executeQuery = $stmt->execute([$first_name, $last_name, $gender, $age, $position, $team, $specialty, $start_date, $employee_id]);

        if ($executeQuery) {
            return True;

        }
    }


    function deleteAEmployee($pdo, $employee_id) {

        $sql = "DELETE FROM employees WHERE employee_id = ?";

        $stmt = $pdo->prepare($sql);

        $executeQuery = $stmt->execute([$employee_id]);

        if ($executeQuery) {
            return True;
        }
    }
?>