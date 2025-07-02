<?php
require 'db_connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$message = $_POST['message'];

$sql = "UPDATE users SET 
        name='$name', email='$email', mobile='$mobile',
        gender='$gender', country='$country', message='$message' 
        WHERE id=$id";

if ($conn->query($sql)) {
    echo "✅ User updated. <a href='view.php'>Back to Users</a>";
} else {
    echo "❌ Update failed: " . $conn->error;
}

$conn->close();
?>
