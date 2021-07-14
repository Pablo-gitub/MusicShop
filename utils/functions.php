<?php

    function registerLoggedUser($dip) {

        $_SESSION["Username"] = $dip["Username"];
        $_SESSION["isAdmin"] = $dip["Privilegi"];
   }

    function isLogged() {

        return !empty($_SESSION["Username"]);
    }

?>