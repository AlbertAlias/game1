<?php
include "dbconn.php"; // Connect to the database

// Step 1: Check if ID is provided
if (!isset($_GET["id"])) {
    die("Task ID is missing!"); // Stop if no ID is found
}

$id = $_GET["id"]; // Store the ID

// Step 2: Fetch task from the database
$sql = "SELECT * FROM tasks WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$task = $result->fetch_assoc();

// Step 3: If task is not found, show an error
if (!$task) {
    die("Task not found!");
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <h2 class="text-center">Edit Task</h2>

    <!-- Step 4: Create the form -->
    <form action="update_task.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>"> <!-- Store task ID -->

        <div class="mb-3">
            <label for="task" class="form-label">Task</label>
            <input type="text" name="task" class="form-control" value="<?php echo htmlspecialchars($task['task']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>