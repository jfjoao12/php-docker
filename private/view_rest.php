<?php
    require_once(__DIR__ . "/../include/connect.php");
    require_once(__DIR__ . '/../include/database.php');
    $page_id = $_GET['page_id'];

    $query = "SELECT pages.*, games.*, game_data.*
              FROM pages
              INNER JOIN games ON pages.game_id = games.game_id
              INNER JOIN game_data ON games.game_data_id = game_data.game_data_id
              WHERE pages.page_id = :page_id";

    $statement = $db->prepare($query);
    $statement->bindParam(':page_id', $page_id);
    $statement->execute();

    $page = $statement->fetch();

    $pageResult = [];
    foreach ($page as $key=>$value) {
        if (!is_numeric($key)) {
            $pageResult[$key] = $value;
        }
    }

    // var_export($page);
    // return is JSON
    header("Content-Type: application/json");
    echo json_encode($pageResult);
