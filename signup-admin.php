<?php
    require_once("bootstrap.php");

    $templateParams["pageName"] = "Registrazione";
    $templateParams["pageMainNav"] = "nav.php";
    $templateParams["pageMainSection"] = "activate-admin.php";

    require("template/signup-expanded.php");
?>