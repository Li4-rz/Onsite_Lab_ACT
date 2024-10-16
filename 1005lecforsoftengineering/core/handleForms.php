<?php
    require_once 'dbConfig.php';
    require_once 'models.php';

    if(isset($_POST['insertNewEmployeeBtn'])){
        $employeeid = $_POST['employeeid'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $position = $_POST['position'];
        $team = $_POST['team'];
        $specialty = $_POST['specialty'];
        $start_date = $_POST['startdate'];

        if (!empty($employeeid) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($position) && !empty($team) && !empty($specialty) && !empty($start_date)) {

            $query = insertIntoEmployeeRecords($pdo, $employeeid, $firstName, $lastName, $gender, $age, $position, $team, $specialty, $start_date);

            if ($query){
                header("Location:../index.php");
            } else {
                echo "Insetion Failed";
            }
        } else {
            echo "Make sure that no fields are empty";
        }
    }


    if(isset($_POST['editEmployeesBtn'])) {
        $employeeid = $_POST['employee_id'];
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $position = $_POST['position'];
        $team = $_POST['team'];
        $specialty = $_POST['specialty'];
        $start_date = $_POST['startdate'];

        if (!empty($employeeid) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($position) && !empty($team) && !empty($specialty) && !empty($start_date)) {

            $query = updateAEmployee($pdo, $employeeid, $firstName, $lastName, $gender, $age, $position, $team, $specialty, $start_date);

            if ($query) {
                header("Location: ../index.php");
            } else {
                echo "Update failed";
            }
        } else {
            echo "Make sure that no fields are empty";
        }
    }


    if(isset($_POST['deleteEmployeeBtn'])) {

        $query = deleteAEmployee($pdo, $_GET['employee_id']);

        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Deletion failed";
        }
    }
?>