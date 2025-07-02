<?php
require 'db_connection.php';

$id = $_GET['id'] ?? 0;

$conn->query("DELETE FROM users WHERE id=$id");

echo "✅ User deleted. <a href='view.php'>Back to Users</a>";
$conn->close();
?>
