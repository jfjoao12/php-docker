<?php
$userId = $_SESSION["user_id"] ?? null;
$get_username = $_SESSION["username"]  ?? null;


if (isset($_GET["logout"])) {
    session_destroy();
    $userId = null;
    $get_username = null;
}

if (!isset($userId) && !defined("PUBLIC_PAGE")) {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $login = false;

    if (!empty($username) && !empty($password)) {
        $query = "SELECT username, password, user_id, usertype 
                  FROM users 
                  WHERE username = :username AND password = :password";

        $statement = $db->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $statement->execute();

        $row = $statement->fetch();

        if ($row) {
            $login = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['usertype'];
        }
        // } else {
        // }
    }

    if (!$login) {
        require "./private/login.php";
        exit();
    }
}
?>
