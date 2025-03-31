<?php


if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $delete_user_query = "DELETE FROM users WHERE user_id = :user_id";
    $delete_statement = execute_query($delete_user_query, [':user_id' => $user_id]);

}
?>
<?php if ($delete_statement): ?>
    <p class="success-message">User deleted successfully.</p>
    <a href="/manage_users">Go back</a>
<?php else: ?>
    <p class="error">Error deleting user.</p>
<?php endif; ?>

