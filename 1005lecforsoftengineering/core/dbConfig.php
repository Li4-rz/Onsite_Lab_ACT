<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "pasuquin";
$dsn = "mysql:host={$host};dbname={$dbname}";

try {

    $pdo = new PDO($dsn, $user, $password);

    $pdo->exec("SET time_zone = '+08:00'");

    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>