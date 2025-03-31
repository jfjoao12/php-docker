<?php

require("./include/connect.php");
include('./include/database.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to retrieve hashed password from the database
    $query = "SELECT user_id, username, password, usertype
             FROM users WHERE username = :username";
    $statement = execute_query($query, [':username' => $username]);
    $user = $statement->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['usertype'] = $user['usertype'];
        header("Location: ./home/logged_in=true");
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <link rel="stylesheet" href="index.css" />
    <title>Login</title>
</head>
<body>


    <div id="login-form" class="form">
        <form action="<?php echo "?p=" . ($_GET['p'] ?? "list"); ?>" method="POST">
            <?php if (isset($error_message)): ?>
                <div>
                    <p class="login-error"><?php echo $error_message; ?></p>
                </div>
            <?php endif; ?>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username">
            <label for="password">Password: </label>
            <input type="password" id="password" name="password">
            <button type="submit" id="submit" value="submit">Log-in</button>
        </form>
    </div>
</body>
</html>
