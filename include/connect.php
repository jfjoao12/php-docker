 <?php
if (!defined('DB_DSN')) {
    define('DB_DSN', 'sqlite:/opt/databases/mydb.sq3');
}
if (!defined('DB_USER')) {
    define('DB_USER', 'serveruser');
}
if (!defined('DB_PASS')) {
    define('DB_PASS', 'gorgonzola7!');
}
    //  PDO is PHP Data Objects
    //  mysqli <-- BAD.
    //  PDO <-- GOOD.
     try {
         // Try creating new PDO connection to MySQL.
         $db = new PDO(DB_DSN, DB_USER, DB_PASS);
         //,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
     } catch (PDOException $e) {
         print "Error: " . $e->getMessage();
         die(); // Force execution to stop on errors.
         // When deploying to production you should handle this
         // situation more gracefully. ¯\_(ツ)_/¯
     }

 ?>