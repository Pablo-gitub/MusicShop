<?php
    require_once("bootstrap.php");

    if (isset($_POST['resetUsername']) && isset($_POST['newPassword'])) {

        $newpaswd = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

        $dbh->passwordReset($_POST['resetUsername'], $newpaswd);
        unset($_POST['resetUsername'], $_POST['newPassword']);
    }

    if (isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['email']) && 
        isset($_POST['pass']) && isset($_POST['address']) && isset($_POST['city']) &&
        isset($_POST['state']) && isset($_POST['zip']) && isset($_POST['ccnumber']) && 
        isset($_POST['ccexp']) && isset($_POST['cccvv'])) {

            $pswd = password_hash($_POST['pass'], PASSWORD_DEFAULT);

            $dbh->registerUser($_POST['nome'], $_POST['cognome'], $_POST['email'], $pswd, 
                                $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], 
                                $_POST['ccnumber'], $_POST['ccexp'], $_POST['cccvv']);

        unset($_POST['nome'], $_POST['cognome'], $_POST['email'], $_POST['pass'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['ccnumber'], $_POST['ccexp'], $_POST['cccvv']);
    }

    if (isset($_POST['adminUsername']) && isset($_POST['adminPassword']) && isset($_POST['code'])) {
        
        $admPswd = password_hash($_POST['adminPassword'], PASSWORD_DEFAULT);

        $dbh->registerAdmin($_POST['adminUsername'], $admPswd);
        unset($_POST['adminUsername'], $_POST['adminPassword'], $_POST['code']);

    }

    if (isset($_POST['username']) && isset($_POST['password'])) {

        $user = $dbh->checkLogin($_POST['username'], $_POST['password']);
        if (count($user) == 0) {
            
            $templateParams["pageFailedLogin"] = '<script src="./js/loginManager.js"></script>';
        }
        else registerLoggedUser($user[0]);
        unset($_POST['username'], $_POST['password']);
    }

    if (isLogged() && !($_SESSION['isAdmin'])) {
        
        header('Location: index.php'); 
    }
    else if (isLogged() && $_SESSION['isAdmin']) {
        
        header('Location: index-admin.php');
    }
    else {
        
        $templateParams["pageName"] = "Login";
        $templateParams["pageMainNav"] = "nav.php";
        $templateParams["pageMainSection"] = "login-form.php";

        require("template/login-expanded.php");
    }

?>