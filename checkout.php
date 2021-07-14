<?php
    require_once("bootstrap.php");

    if(isset($_SESSION['Username'])) {

        if (isset($_POST['AlbumId']) && isset($_POST['Quantità'])) {

            $albumid = intval($_POST['AlbumId']);
            $quantity = intval($_POST['Quantità']);
            $dbh->insertCartItems($_SESSION['Username'], $albumid, $quantity);
            unset($_POST['AlbumId'], $_POST['Quantità']);
        }

        if (isset($_POST['Username']) && isset($_POST['AlbumId'])) {
        
            $username = $_POST['Username'];
            $albumid = $_POST['AlbumId'];
            $dbh->removeCartItem($username, $albumid);
            unset($_POST['Username'], $_POST['AlbumId']);
        }

        $cartItem = $dbh->getCartItems($_SESSION['Username']);
        $numItems;

        foreach ($cartItem as $item) {
            $numItems += $item['Quantità'];
        }
        
        if (!empty($cartItem)) {
    
            $templateParams["pageName"] = "Carrello";
            $templateParams["pageMainNav"] = "nav.php";
            $templateParams["pageMainSection"] = "articoli-carrello.php";
            $templateParams["pageSecondarySection"] = "checkout-amount.php";
    
            require("template/checkout-expanded.php");  
        }
        else {

            $templateParams["pageName"] = "Carrello";
            $templateParams["pageMainNav"] = "nav.php";
            $templateParams["pageMainSection"] = "blank.php";
            $templateParams["pageSecondarySection"] = "checkout-amount-blank.php";
    
            require("template/checkout-expanded.php");  
        }
    }
    else require("login.php");

?>