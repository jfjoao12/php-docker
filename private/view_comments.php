<?php
require("./include/connect.php");



// Add comment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comment_add"])) {
    $add_comment_query =
        "INSERT INTO comments (page_id, user_id, comment_date, comment)
         VALUES (:page_id, :user_id, :comment_date, :comment)";

    $addCommentStatement = execute_query($add_comment_query, [
        ':page_id' => sanitizeInput($page_id),
        ':user_id' => $_SESSION['user_id'],
        ':comment_date' => date("Y-m-d H:i:s"),
        ':comment' => sanitizeInput($_POST["comment_add"])
    ]);
}


// Delete comment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_comment"])) {
    $delete_comment_query = "DELETE FROM comments WHERE comment_id = :comment_id";
    $deleteCommentStatement = execute_query($delete_comment_query, [
        ':comment_id' => $_POST["comment_id"]
    ]);


}

$commentsQuery = "SELECT comments.comment_id, comments.comment, comments.comment_date,
               users.username
        FROM comments
        JOIN users ON comments.user_id = users.user_id
        JOIN pages ON comments.page_id = pages.page_id
        WHERE pages.page_id = :page_id
        ORDER BY comments.comment_date DESC";

$page_id = $_GET['page_id'];
$commentsStatement = execute_query($commentsQuery, [':page_id' => $page_id]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Comments Page</title>
    <link rel="stylesheet" type="text/css" href="/private/styles.css">
</head>
<body>
<h1>Comments</h1>
    <form action="?p=view&page_id=<?=$_GET['page_id']; ?>" method="post" id="add_comment_form">
        <textarea id="comment_add" name="comment_add" place_holder="Add your comment here"></textarea>
        <input type="submit" value="Post">
    </form>

    <div id="comments">
        <?php if ($commentsStatement->rowCount() > 0): ?>
            <?php while ($comment = $commentsStatement->fetch()): ?>
                <div class="individual-comment">
                    <p id="comment-username">Posted by: <?= $comment['username'] ?></p>
                    <p id="comment-comment">Comment:<br><?= $comment['comment'] ?></p>
                    <p id="comment-date">Date: <?= $comment['comment_date'] ?></p>
                    <?php if($grabData['usertype'] == 'admin'):?>
                        <a id="delete_comment" href="?p=delete_comment&comment_id=<?= $comment['comment_id'] ?>" onclick="return confirm('Are you sure you want to delete this comment?')">Delete Comment</a>
                    <?php endif;?>

                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No comments yet, please come back later or post the first one!</p>
        <?php endif; ?>
        <?= "Page ID:" . $page_id ?>
    </div>
</body>
</html>
