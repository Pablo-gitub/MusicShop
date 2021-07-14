<?php 

    session_start();
    require_once("db/database.php");
    require_once("utils/functions.php");

    $dbh = new DatabaseHelper("localhost", "root", "", "music_shop", 3306);

    define("UPLOAD_DIR", "./upload/");
    define("UPLOAD_ADVERTISEMENT", "./upload/Advertisement/");
?>