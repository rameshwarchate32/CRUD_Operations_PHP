<?php
require 'db_connection.php';

$result = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View All Users</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #333;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>

    <h2>Registered Users</h2>
    <a href="form.html">➕ Add New User</a><br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Message</th>
            <th>File</th>
            <th>Registered At</th>
            <th>Actions</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['mobile']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['country']}</td>
                        <td>{$row['message']}</td>
                        <td>";
                if (!empty($row['file_name'])) {
                    echo "<a href='uploads/{$row['file_name']}' target='_blank'>View</a>";
                } else {
                    echo "No File";
                }
                echo "</td>
                        <td>{$row['created_at']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Edit</a> |
                            <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No users found.</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
$conn->close();
?>
