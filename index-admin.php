<?php
    require_once("bootstrap.php");

    if (isset($_POST['id'])) {
        
        $id = $_POST['id'];
        if (isset($_POST['img']) && isset($_POST['title']) 
            && isset($_POST['band']) && isset($_POST['desc']) 
            && isset($_POST['year']) && isset($_POST['genre']) 
            && isset($_POST['quantity']) && isset($_POST['price'])) {  

                $dbh->updateItem($_POST['title'], $_POST['band'], $_POST['img'], $_POST['desc'], $_POST['genre'], $_POST['price'], $_POST['quantity'], $_POST['year'], $_POST['id']);        
                unset($_POST);
        }

    }   

    if (isset($_POST['add'])) {

        if (isset($_POST['img']) && isset($_POST['title']) 
            && isset($_POST['band']) && isset($_POST['desc']) 
            && isset($_POST['year']) && isset($_POST['genre'])
            && isset($_POST['quantity']) && isset($_POST['price'])) {

                $dbh->addItem($_POST['title'], $_POST['band'], $_POST['img'], $_POST['desc'], $_POST['genre'], $_POST['price'], $_POST['quantity'], $_POST['year']);
                unset($_POST);
        }
    }

    if (isset($_POST['delete'])) {
        $dbh->deleteItem($_POST['item']);
        unset($_POST);
    }

    if (isset($_POST['st']) && isset($_POST['ord'])) {
        $dbh->updateOrderStatus($_POST['st'], $_POST['ord']);
        unset($_POST);
    }

    $collection = $dbh->getAlbums();
    $orders = $dbh->getOrders();
    $orders = array_reverse($orders);
    
    
    $templateParams["pageName"] = "Admin";
    $templateParams["pageMainNav"] = "nav.php";
    $templateParams["pageMainSection"] = "articoli-admin.php";
    $templateParams["pageSecondarySection"] = "ordini-admin.php";

    require("template/base-admin.php");
?>