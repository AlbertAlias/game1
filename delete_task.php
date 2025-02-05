<?php 
include "dbconn.php"; // FOR DATABASE CONNECTION

if (isset($_GET["id"])) { // THIS CHECKS IF AN ID IS PROVIDED
    $id = $_GET["id"]; // IT STORES THE TASK ID IN A VARIABLE
    $sql = "DELETE FROM task WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
?>