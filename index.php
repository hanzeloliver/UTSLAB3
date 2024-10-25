<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Welcome to To-Do List App</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to the To-Do List Application</h1>
        <p>Your personal task manager.</p>

        <?php if (isset($_SESSION['user_id'])): ?>
            <p>You are logged in. <a href="dashboard.php">Go to your dashboard</a></p>
            <p><a href="logout.php">Logout</a></p>
        <?php else: ?>
            <p><a href="login.php">Login</a> or <a href="register.php">Register</a> to get started!</p>
        <?php endif; ?>
    </div>
</body>
</html>