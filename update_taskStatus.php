<?php
include "dbconn.php"; // FOR DATABASE CONNECTION

if (isset($_GET["id"])) { // THIS CHECKS IF AN ID IS PROVIDED
    $id = $_GET["id"]; // IT STORES THE TASK ID IN A VARIABLE

    $sql = "UPDATE tasks SET status = 1 WHERE id = ?"; // SQL STATEMENT
    $stmt = $conn->prepare($sql); // THIS PREPARES THE STATEMENT
    $stmt->bind_param("i", $id); // THE "i" MEANS INTEGER
    $stmt->execute(); // THIS EXECUTES THE STATEMENT
    $stmt->close(); // THIS CLOSES THE STATEMENT
}

header("Location: index.php"); // REDIRECT TO TASK LIST
exit();
?>