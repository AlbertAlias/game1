<?php 
include "dbconn.php"; // FOR DATABASE CONNECTION

if ($_SERVER["REQUEST_METHOD"] == "POST") { // METHOD FOR INSERTING DATA
    $task = $_POST["task"]; // TO GET THE DATA IN TASK INPUT
    if (!empty($task)) { // ONLY INSERTS IF NOT EMPTY
        $sql = "INSERT INTO tasks (task) VALUES (?)"; // SQL STATEMENT
        $stmt = $conn->prepare($sql); // THIS PREPARES THE STATEMENT
        $stmt->bind_param("s", $task); // "s" MEANS STRING DATA TYPE
        $stmt->execute(); // THIS EXECUTES THE STATEMENT
        $stmt->close();
    }

    header("Location: index.php"); // REDIRECT TO TASK LIST
    exit();
}

?>