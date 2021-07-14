<?php
    
    require_once("bootstrap.php");

    $cartItem = $dbh->getCartItems($_SESSION['Username']);

    if (isset($_POST['nome']) && isset($_POST['cognome']) 
            && isset($_POST['indirizzo']) && $_POST['stato'] 
            && isset($_POST['citta']) && isset($_POST['zip']) 
            && isset($_POST['ccnumber']) && isset($_POST['ccexp']) && isset($_POST['cccvv'])) {    
                
        foreach ($cartItem as $item) {
    
            $album = $dbh->getAlbumFromId($item['AlbumId']);
            $album = $album[0];

            $itemPrice = $album['Prezzo'] * $item['Quantità'];
            $tot += $itemPrice;
        }

        $tot = $tot * 1.22;
        $date = date('Y-m-d');

        $dbh->insertOrder($_SESSION['Username'], $tot, $date, 
            $_POST['nome'], $_POST['cognome'], $_POST['indirizzo'], $_POST['citta'],
            $_POST['stato'], $_POST['zip'], $_POST['ccnumber'], $_POST['ccexp'], $_POST['cccvv'],
            $cartItem);

        unset($_POST['nome'], $_POST['cognome'], $_POST['indirizzo'], $_POST['citta'], $_POST['stato'], $_POST['zip']);
        unset($_POST['ccnumber'], $_POST['ccexp'], $_POST['cccvv']);
        header('Location: index.php'); 
    }


    $user = $dbh->getUser($_SESSION['Username']);
    $user = $user[0];


    $templateParams["pageName"] = "Order data";
    $templateParams["pageMainNav"] = "nav.php";
    $templateParams["pageMainSection"] = "checkout-form.php";

    require("template/signup-expanded.php");

?>