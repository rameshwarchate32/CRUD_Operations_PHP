<?php
require 'db_connection.php';

$id = $_GET['id'] ?? 0;

$result = $conn->query("SELECT * FROM users WHERE id=$id");

if ($result->num_rows === 0) {
    die("User not found.");
}

$data = $result->fetch_assoc();
?>

<h2>Edit User</h2>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    Name: <input type="text" name="name" value="<?= $data['name'] ?>"><br><br>
    Email: <input type="email" name="email" value="<?= $data['email'] ?>"><br><br>
    Mobile: <input type="text" name="mobile" value="<?= $data['mobile'] ?>"><br><br>
    Gender:
    <input type="radio" name="gender" value="Male" <?= $data['gender'] == 'Male' ? 'checked' : '' ?>> Male
    <input type="radio" name="gender" value="Female" <?= $data['gender'] == 'Female' ? 'checked' : '' ?>> Female<br><br>
    Country:
    <select name="country">
        <option value="India" <?= $data['country'] == 'India' ? 'selected' : '' ?>>India</option>
        <option value="USA" <?= $data['country'] == 'USA' ? 'selected' : '' ?>>USA</option>
    </select><br><br>
    Message:<br>
    <textarea name="message"><?= $data['message'] ?></textarea><br><br>
    <button type="submit">Update</button>
</form>
