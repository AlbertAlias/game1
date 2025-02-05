<?php include "dbconn.php"; ?>
<?php 
$sql = "SELECT * FROM tasks ORDER BY created_at DESC"; //GET ALL LATEST TASK TO OLDEST
$result = $conn->query($sql); // THIS RUNS THE QUERY AND STORES THE RESULT
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-3">
        <h2 class="text-center">To-Do Lists</h2>

        <form class="d-flex" action="add_task.php" method="POST">
            <input type="text" name="task" class="form-control me-2" placeholder="Add Task" required>
            <button class="btn btn-success">Add Task</button>
        </form>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!-- THIS DYNAMICALLY RETRIEVE THE DATA FROM THE DATABASE AND POPULATE IN THE
             TABLE DATA (TD) INSIDE THE TABLE ROW (TR) OF THE TABLE BODY (TBODY) IT LOOPS
             THROUGH EACH TASK IN $RESULT USING THE WHILE ($ROW = $RESULT->FETCH_ASSOC()) 
             ALSO USES CONDITIONAL LOGIC TO SHOW COMPLETED OR PENDING -->
            <tbody> 
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["task"]; ?></td>
                        <td>
                            <?php echo ($row["status"] == 1) ? "<span class='badge bg-success'>Completed</span>" : "<span class='badge bg-warning'>Pending</span>"; ?>
                        </td>
                        <td>
                            <a href="update_task.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Complete</a>
                            <a href="delete_task.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>