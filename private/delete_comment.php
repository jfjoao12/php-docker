<?php
require("./include/connect.php");

if (isset($_GET['comment_id']) && !empty($_GET['comment_id'])) {
    $comment_id = $_GET['comment_id'];

    $query = "DELETE FROM comments WHERE comment_id = :comment_id";

    $statement = $db->prepare($query);
    $statement->bindParam(':comment_id', $comment_id);
    $success = $statement->execute();

    if ($success) {
        echo "Deletion Successfull!";
        exit();
    } else {
        echo "Failed to delete the comment.";
    }
} else {
    echo "Comment ID not provided.";
}
?>