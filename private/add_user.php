<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['username'], $_POST['password'], $_POST['usertype'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    // Hash the password before storing it in the database (for security)
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute SQL query to add the new user
    $add_user_query = "INSERT INTO users (username, password, usertype) VALUES (:username, :password, :usertype)";
    $add_statement = execute_query($add_user_query, [
        ':username' => $username,
        ':password' => $encrypted_password,
        ':usertype' => $usertype
    ]);

    if ($add_statement) {
        echo "User added successfully.";
    } else {
        echo "Error adding user.";
    }
}
?>

<title>Add User</title>
<h1>Users Management</h1>

<!-- Form to add a new user -->
<h2>Add New User</h2>
<form method="post" action="?p=add_user">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    
    <label for="usertype">User Type:</label>
    <select name="usertype" id="usertype">
        <option value="admin">Admin</option>
        <option value="regular">Regular</option>
        <option value="mod">Mod</option>
    </select>
    
    <button type="submit">Add User</button>
</form>


