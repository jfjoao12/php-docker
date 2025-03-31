<?php
require("./include/connect.php");

if (isset($_GET['page_id']) && !empty($_GET['page_id'])) {
    $page_id = $_GET['page_id'];

    $query = "DELETE FROM pages WHERE page_id = :page_id";

    $statement = $db->prepare($query);
    $statement->bindParam(':page_id', $page_id);
    $success = $statement->execute();

    if ($success) {
        echo "Deletion Successfull!";
        exit();
    } else {
        echo "Failed to delete the page.";
    }
} else {
    echo "Page ID not provided.";
}
?>