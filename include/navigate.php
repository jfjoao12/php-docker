<?php
$navigateTo = $_GET["p"] ?? "home";
$fileToInclude = "./private/{$navigateTo}.php";

if (!file_exists($fileToInclude)) {

    $fileToInclude = "./public/{$navigateTo}.php";
    if (!file_exists($fileToInclude)) {
        $fileToInclude = "./public/error.php";
    }
    // define("PUBLIC_PAGE", true);
} else {
    require_once("./include/authenticate.php");
}

define("PAGE", $fileToInclude);

function main() {
    require("./include/connect.php");
    require('./include/database.php');
    require(PAGE);
}

?>