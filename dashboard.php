<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST ') {
    $title = htmlspecialchars($_POST['title']);

    $stmt = $conn->prepare("INSERT INTO todo_lists (user_id, title) VALUES (?, ?)");
    $stmt->bind_param("is", $userId, $title);
    $stmt->execute();
    $stmt->close();
}

$stmt = $conn->prepare("SELECT * FROM todo_lists WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$todoLists = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <form method="POST" action="">
            <input type="text" name="title" placeholder="New To-Do List Title" required>
            <input type="submit" value="Create To-Do List">
        </form>
        <ul>
            <?php foreach ($todoLists as $list) { ?>
                <li>
                    <a href="#"><?= $list['title']; ?></a>
                    <form method="POST" action="delete_list.php" style="display:inline;">
                        <input type="hidden" name="list_id" value="<?= $list['id']; ?>">
                        <button type="submit" class="delete-list">Delete</button>
                    </form>
                </li>
            <?php } ?>
        </ul>
        <p><a href="logout.php">Logout</a></p>
    </div>
    <script src="script.js"></script> <!-- Include the script.js file -->
</body>
</html>