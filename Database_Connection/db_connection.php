<?php

    // Database Connection Varibales
    $host = "localhost";
    $username = "root";
    $password ="";
    $database = "form_validation_db";

    // Create Connection

    $conn = new mysqli($host, $username, $password, $database);

    // Check Connection
    if($conn->connect_error) {
        die("Connection Failed: ". $conn->connect_error);
    } else {
        echo "Connected Successfully";
    }

?>