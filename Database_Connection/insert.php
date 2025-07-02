<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $country = $_POST['country'] ?? '';
    $message = $_POST['message'] ?? '';
    $file = $_FILES['profile'] ?? null;

    if (empty($name) || empty($email) || empty($password) || empty($mobile) ||
        empty($gender) || empty($country) || empty($message) || !$file) {
        die("❌ All fields are required.");
    }

    $file_name = '';
    if ($file['error'] === UPLOAD_ERR_OK) {
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir);
        }
        $file_name = basename($file['name']);
        move_uploaded_file($file['tmp_name'], $upload_dir . $file_name);
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password, mobile, gender, country, message, file_name)
            VALUES ('$name', '$email', '$password_hash', '$mobile', '$gender', '$country', '$message', '$file_name')";

    if ($conn->query($sql)) {
        echo "✅ Data inserted successfully! <a href='view.php'>View All Users</a>";
    } else {
        echo "❌ Error: " . $conn->error;
    }

    $conn->close();
}
?>
