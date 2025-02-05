<?php
include "dbconn.php"; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"]; // Get task ID
    $task = $_POST["task"]; // Get updated task name

    if (!empty($task)) {
        $sql = "UPDATE tasks SET task = ? WHERE id = ?"; // SQL Update query
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $task, $id); // "s" for string, "i" for integer
        $stmt->execute();
        $stmt->close();
    }

    header("Location: index.php"); // Redirect to task list
    exit();
}
?>
