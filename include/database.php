<?php


function sanitizeInput($input) {
    return filter_var(trim($input), FILTER_SANITIZE_STRING);
}

function execute_query($query, $params = []) {
    global $db;
    $statement = $db->prepare($query);
    $statement->execute($params);
    return $statement;
}

function sql_command($sql_query, $params = []) {
    global $db; 

    $statement = $db->prepare($sql_query);

    if (!empty($params)) {
        $statement->execute($params);
    } else {
        $statement->execute();
    }

    $executed_statement = $statement->fetch();
    return $executed_statement;
}



if (isset($_SESSION['user_id'])) {
    $user_id =  $_SESSION['user_id'];
    
    $userQuery = "SELECT user_id, usertype
                  FROM users
                  WHERE user_id = :user_id";

    $usersStatements = execute_query($userQuery, [':user_id' => $user_id]);
    $grabData = $usersStatements->fetch();

}

?>