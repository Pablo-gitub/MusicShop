<?php
    require_once("bootstrap.php");

    if (isset($_POST['Token'])) {

        unset($_SESSION['Username'], $_SESSION['isAdmin'], $_POST['Token']);
    }
    if (isset($_POST['Band']) || isset($_POST['Genre']) || isset($_POST['Year'])) {

        isset($_POST['Band'])? $bandFilter = $_POST['Band']:$bandFilter = "%";
        isset($_POST['Genre'])? $genreFilter = $_POST['Genre']:$genreFilter = "%";
        isset($_POST['Year'])? $yearFilter = $_POST['Year']:$yearFilter = "%";
        
        $collection = $dbh->getAlbumsFiltered($bandFilter, $genreFilter, $yearFilter);
        unset($_POST['Band'], $_POST['Genre'], $_POST['Year']);
    }
    else {
        $collection  = $dbh->getAlbums();
    }
    
    $genres = $dbh->getGenres();
    $bands = $dbh->getBands();
    $years = $dbh->getYears();
    $bands = array_values(array_unique($bands, SORT_REGULAR));
    $genres = array_values(array_unique($genres, SORT_REGULAR));
    $years = array_values(array_unique($years, SORT_REGULAR));

    $templateParams["pageName"] = "Home";
    $templateParams["pageMainNav"] = "nav.php";
    $templateParams["pageMainAdvertisement"] = "advertisement.php";
    $templateParams["pageMainFilters"] = "filtri.php";
    $templateParams["pageMainSection"] = "articoli-user.php";

    require("template/base-user.php");
?>