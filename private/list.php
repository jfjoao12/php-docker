<?php

$query = "SELECT pages.page_id, pages.slug, pages.date, games.game_name, users.username, users.usertype
          FROM pages
          JOIN games ON pages.game_id = games.game_id
          JOIN users ON pages.user_id = users.user_id";

$statement = execute_query($query, []);
$page_title = "";

if(isset($_GET['filter'])) {

    switch ($_GET['filter']) {
        case 'name':
            $query .= " ORDER BY games.game_name ASC";
            break;
        case 'date':
            $query .= " ORDER BY pages.date ASC";
            break;
        case 'page_id':
            $query .= " ORDER BY pages.page_id ASC";
            break;
        // default:
        //     $query .= " ORDER BY pages.date DESC";
        //     break;
    }

    $page_title = "List of games";
    $statement = execute_query($query, []);

} elseif (isset($_GET['search'])) {
    $query .=  " WHERE
                (
                 games.game_name LIKE  :search_term OR
                 users.username  LIKE :search_term OR
                 pages.date      LIKE :search_term
                )";

    $search_term = '%' . sanitizeInput($_GET['search']) . '%';

    $page_title = "Search";
    $statement = execute_query($query, [':search_term' => $search_term]);
} else {
    $page_title = "List of Games";
}




// $statement = $db->prepare($query);
// $statement->execute();

// Grabbing from user table to dynamically show what the user can see on the page
// depending on their usertype
?>

<link rel="stylesheet" type="text/css" href="/private/styles.css" />

<title><?= $page_title ?></title>

<h1><?= $page_title ?></h1>
<?php if (empty($statement->fetch())): ?>
    <h2>Sorry, no results found</h2>
    <?php elseif(isset($_GET['search']) && empty($_GET['search'])): ?>
        <h2>Sorry, search can't be empty!</h2>
    <?php else: ?>
        <form method="GET" action="<?= $_SERVER['PHP_SELF'] ?>">
            <?php foreach ($_GET as $key => $value): ?>
                <?php if ($key !== 'filter'): ?>
                    <input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
                <?php endif; ?>
            <?php endforeach; ?>

            <div id="barButtonSearch">
                <label for="filter">Filter by:</label>
                <select name="filter" id="filter">
                    <option value="name">Name</option>
                    <option value="date">Date</option>
                    <option value="page_id">Page ID</option>
                </select>
                <button type="submit" class="submit-button">Filter</button>
            </div>
        </form>

    <table id="show_games_list">
        <tr>
            <th>Page ID</th>
            <th>Game Name</th>
            <th>Username</th>
            <th>Date</th>
            <?php if ($grabData["usertype"] == "admin"):?>
                <th>Edit</th>
            <?php endif; ?>
            <th>View</th>
        </tr>

            <?php while ($row = $statement->fetch()): ?>
                <tr>
                    <td><?= $row['page_id'] ?></td>
                    <td><?= $row['game_name'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <?php if ($grabData["usertype"] == "admin"):?>
                    <td><a href="edit/<?= $row['page_id'] ?>">Edit</a></td>
                    <?php endif; ?>
                    <td><a href="view/<?= $row['page_id'] ?>/<?= $row['slug'] ?>">View</a></td>
                </tr>
            <?php endwhile; ?>
    </table>
<?php endif; ?>
</table>
