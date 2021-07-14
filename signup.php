<?php
    require_once("bootstrap.php");

    $templateParams["pageName"] = "Registrazione";
    $templateParams["pageMainNav"] = "nav.php";
    $templateParams["pageMainSection"] = "signup-form.php";

    require("template/signup-expanded.php");

?>