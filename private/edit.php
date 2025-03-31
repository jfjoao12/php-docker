<?php
require("./include/connect.php");

// Check if form is submitted and page ID is set
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['page_id'])) {
    // Sanitize input
    $number_of_targets = filter_input(INPUT_POST, 'number_of_targets', FILTER_SANITIZE_NUMBER_INT);
    $duration_time = filter_input(INPUT_POST, 'duration_time', FILTER_SANITIZE_NUMBER_INT);
    $time_alive = filter_input(INPUT_POST, 'time_alive', FILTER_SANITIZE_NUMBER_INT);
    $target_size = filter_input(INPUT_POST, 'target_size', FILTER_SANITIZE_NUMBER_INT);
    $multiple_targets = isset($_POST['multiple_targets']) ? 1 : 0;
    $game_name = filter_input(INPUT_POST, 'game_name', FILTER_SANITIZE_STRING);
    $game_type = filter_input(INPUT_POST, 'game_type', FILTER_SANITIZE_STRING);
    $game_description = filter_input(INPUT_POST, 'game_description', FILTER_SANITIZE_STRING);
    $page_id = filter_input(INPUT_POST, 'page_id', FILTER_SANITIZE_NUMBER_INT);

    $queryUpdateGameData = "UPDATE game_data 
                            SET number_of_targets = :number_of_targets, 
                                multiple_targets = :multiple_targets, 
                                duration_time = :duration_time, 
                                time_alive = :time_alive, 
                                target_size = :target_size
                            WHERE game_data_id = (
                                SELECT game_data_id 
                                FROM pages 
                                WHERE page_id = :page_id
                            )";
    $statementUpdateGameData = $db->prepare($queryUpdateGameData);
    $statementUpdateGameData->bindParam(':number_of_targets', $number_of_targets);
    $statementUpdateGameData->bindParam(':multiple_targets', $multiple_targets);
    $statementUpdateGameData->bindParam(':duration_time', $duration_time);
    $statementUpdateGameData->bindParam(':time_alive', $time_alive);
    $statementUpdateGameData->bindParam(':target_size', $target_size);
    $statementUpdateGameData->bindParam(':page_id', $page_id);

    $queryUpdateGames = "UPDATE games 
                        SET game_name = :game_name, 
                            game_type = :game_type, 
                            game_description = :game_description
                        WHERE game_data_id = (
                            SELECT game_data_id 
                            FROM pages 
                            WHERE page_id = :page_id
                        )";
    $statementUpdateGames = $db->prepare($queryUpdateGames);
    $statementUpdateGames->bindParam(':game_name', $game_name);
    $statementUpdateGames->bindParam(':game_type', $game_type);
    $statementUpdateGames->bindParam(':game_description', $game_description);
    $statementUpdateGames->bindParam(':page_id', $page_id);

    if ($statementUpdateGameData->execute() && $statementUpdateGames->execute()) {
        echo "Game information updated successfully.";
    } else {
        echo "Error updating game information.";
    }
} elseif (isset($_GET['page_id'])) {
    $page_id = filter_input(INPUT_GET, 'page_id', FILTER_SANITIZE_NUMBER_INT);
    $queryPageData = "SELECT pages.*, game_data.*, games.*
                      FROM pages
                      JOIN games ON pages.game_id = games.game_id
                      JOIN game_data ON games.game_data_id = game_data.game_data_id
                      WHERE pages.page_id = :page_id";

    $statementPageData = $db->prepare($queryPageData);
    $statementPageData->bindParam(':page_id', $page_id);
    $statementPageData->execute();
    $page = $statementPageData->fetch();

    if (!$page) {
        echo "Page not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php if (isset($page)) : ?>
    <h1>Edit Game</h1>
    <form method="post" action="">
        <input type="hidden" name="page_id" value="<?= $page['page_id'] ?>">
        <h2>Game Data</h2>
        <label for="multiple_targets">Multiple Targets</label>
        <input type="checkbox" name="multiple_targets" id="multiple_targets" <?= $page['multiple_targets'] ? 'checked' : '' ?>>
        
        <label for="number_of_targets">Number of Targets:</label>
        <input type="number" name="number_of_targets" id="number_of_targets" value="<?= $page['number_of_targets'] ?>">
        
        <label for="duration_time">Duration Time (milliseconds):</label>
        <input type="number" name="duration_time" id="duration_time" value="<?= $page['duration_time'] ?>">
        
        <label for="time_alive">Time Alive (milliseconds):</label>
        <input type="number" name="time_alive" id="time_alive" value="<?= $page['time_alive'] ?>">
        
        <label for="target_size">Target Size (px):</label>
        <input type="number" name="target_size" id="target_size" value="<?= $page['target_size'] ?>">
        
        <h2>Game Info</h2>
        <label for="game_name">Game Name:</label>
        <input type="text" name="game_name" id="game_name" value="<?= $page['game_name'] ?>">
        
        <label for="game_type">Game Type:</label>
        <input type="text" name="game_type" id="game_type" value="<?= $page['game_type'] ?>">
        
        <label for="game_description">Game Description:</label>
        <textarea name="game_description" id="game_description"><?= $page['game_description'] ?></textarea>
        <button type="submit">Update Game</button>
    </form>
<?php else : ?>
    <p>No page selected.</p>
<?php endif; ?>
</body>
</html>
