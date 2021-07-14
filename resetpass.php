<?php
    require_once("bootstrap.php");

    $templateParams["pageName"] = "Password Reset";
    $templateParams["pageMainNav"] = "nav.php";
    $templateParams["pageMainSection"] = "resetpass-form.php";

    require("template/signup-expanded.php");
?>