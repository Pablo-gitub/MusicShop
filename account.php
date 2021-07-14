<?php
    require_once("bootstrap.php");

    if (isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['indirizzo']) &&
        $_POST['stato'] && isset($_POST['citta']) && isset($_POST['zip'])) {

        $dbh->updatePData($_POST['nome'], $_POST['cognome'], $_POST['indirizzo'], $_POST['citta'], $_POST['stato'], $_POST['zip'], $_SESSION['Username']);
        unset($_POST['nome'], $_POST['cognome'], $_POST['indirizzo'], $_POST['citta'], $_POST['stato'], $_POST['zip']);
    }
   
    if (isset($_POST['ccnumber']) && isset($_POST['ccexp']) && isset($_POST['cccvv'])) {

        $dbh->updateCCData($_POST['ccnumber'], $_POST['ccexp'], $_POST['cccvv'], $_SESSION['Username']);
        unset($_POST['ccnumber'], $_POST['ccexp'], $_POST['cccvv']);
    }


    $user = $dbh->getUser($_SESSION['Username']);
    $orders = $dbh->getOrdersOfUser($_SESSION['Username']);
    $orders = array_reverse($orders);
    $user = $user[0];

    $templateParams["pageName"] = "Account";
    $templateParams["pageMainNav"] = "nav.php";
    $templateParams["pageMainSection"] = "account-expanded.php";

    require("template/base-account.php");
?>