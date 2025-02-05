<?php
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "todo_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
        die(json_encode(['error' => 'Database connection failed']));
    }

    mysqli_set_charset($conn, "utf8mb4");
?>