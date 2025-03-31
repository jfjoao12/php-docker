<?php
require("./include/connect.php");


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    
    if ($_POST['password'] == $_POST['password2']) {
        $password = $_POST['password'];
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        $flag = true;
    } else {
        $flag = false;
    }
 
    if ($flag) {
        $query = "INSERT INTO users(username, email, password) VALUES (:username, :email, :password)";
        $params = [
            ':username' => $username,
            ':email' => $email,
            ':password' => $encrypted_password
        ];
        sql_command($query, $params);
    } else {
        $error = "Passwords do not match.";
    }
} else {
    $error = "All fields are required.";
}
?>

<div id="register-page">
  <!--  sql_command($type, $values, $table, $choice, $params = [])  -->

  <h1>Register</h1>
  <form method="post" action=""  class="form">

    <?php if($_SERVER["REQUEST_METHOD"] === "POST" && isset($error)): ?>
      <p class="error"><?= $error ?></p>
    <?php endif;?>
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" required>

    <label for="username">Username: </label>
    <input type="text" name="username" id="username" required>
    
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" required>

    <label for="password2">Retype password: </label>
    <input type="password" name="password2" id="password2" required>

    <input type="submit" value="Register" class="submit-button">
  </form>
  
</div>