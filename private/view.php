<?php

if (isset($_GET['page_id']) && isset($_GET['slug'])) {
    $page_id = $_GET['page_id'];
    $slug = $_GET['slug'];

    $query = "SELECT pages.*, games.*, game_data.*
              FROM pages
              JOIN games ON pages.game_id = games.game_id
              JOIN game_data ON games.game_data_id = game_data.game_data_id
              WHERE
                pages.page_id = :page_id AND
                pages.slug = :slug";

    $statement = $db->prepare($query);
    $statement->bindParam(':page_id', $page_id);
    $statement->bindParam(':slug', $slug);

    $statement->execute();

    $page = $statement->fetch();
    echo json_encode(42);
}

?>
<?php if (!empty($page)): ?>
    <title>View Page</title>
    <script src="https://cdn.jsdelivr.net/npm/yaj@1.0.6/yaj.min.js"></script>
    <!-- <script src="./public/script.js"></script> -->
    <link rel="stylesheet" type="text/css" href="/private/styles.css" />
    <h1>View Page</h1>
    <h2 id="test"></h2>
    <p>Game Name: <?= $page['game_name'] ?></p>
    <p>Game Description: <?= $page['game_description'] ?></p>
    <p>Number of Targets: <?= $page['number_of_targets'] ?></p>
    <p>Duration time: <?= $page['duration_time'] ?></p>
    <p>Time Alive: <?= $page['time_alive'] ?></p>
    <p>Size: <?= $page['target_size'] . "px" ?></p>
    <a id="gameLink" href="./game/<?php echo $_GET["page_id"] ?>">Go to game</a>
    <?php if($grabData['usertype'] == 'admin'):?>
        <a href="./delete/<?= $page_id ?>" onclick="return confirm('Are you sure you want to delete this page?')">Delete</a>
    <?php endif;?>
    <?= include ('./private/view_comments.php');?>
<?php else: ?>
    <h2>Sorry! This game does not exist. Please try again.</h2>
<?php endif; ?>





