<?php
$host = 'localhost';
$db = 'todo_app';
$user = 'root'; // Change this to your database username
$pass = ''; // Change this to your database password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>