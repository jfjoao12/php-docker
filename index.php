<?php
session_start();
require_once("./include/connect.php");
require_once("./include/navigate.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <link rel="stylesheet" href="/index.css" />

</head>
<body>

    <?php if (isset($_GET["logged_in"])): ?>
        <div class="success-alert">
                <p>Sucessfull login!</p>
        </div>
    <?php endif; ?>




    <?php include('public/navbar.php'); ?>



    <div id="main-page-div">
        <!-- <h1>
            Aim Trainer V1.0
        </h1> -->

        <?php main(); ?>

    </div>

</body>
</html>


