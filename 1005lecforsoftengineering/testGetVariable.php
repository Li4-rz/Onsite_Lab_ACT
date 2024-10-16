<?php

    if(isset($_GET['employeeName'])){
        echo "<h2>Employee Name: " . $_GET['employeeName']. "</h2>";
    }


    if(isset(($_GET['position']))){
        echo "<h2>Position: " . $_GET['position']. "</h2>";
    }
    
?>