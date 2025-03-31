<?php

if ($grabData['usertype'] !== 'admin') {
    echo "You are not authorized to access this page.";
    exit();
}

$manage_users_query =
    "SELECT user_id, username, password, usertype
    FROM users";

$grab_manage_user_data = execute_query($manage_users_query, []);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users Management</title>
</head>
<body>
<h1>Users Management</h1>
    <a href="./add_user">Add new user</a>
    <table id="show_users_table">
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Permission</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $grab_manage_user_data->fetch()): ?>
            <tr>
                <td><?= $row['user_id'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['usertype'] ?></td>
                <td>
                    <a href="./edit_users/<?= $row['user_id'] ?>">Modify</a>
                    <a href="./delete_user/<?= $row['user_id'] ?>" onclick="return confirm('Are you sure you want to delete the user?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>