<!DOCTYPE html>
<html lang="it">
    <head>
        <meta name="author" content="Paolo Pietrelli, Luca Spinosi"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" href="./css/style.css"/>

        <title>MyEcommerce - <?php echo $templateParams["pageName"]; ?></title>

        <meta charset="utf-8"/>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <script src="./js/cartManager.js"></script>
        <script src="./js/warehouseManager.js"></script>
        <script src="./js/orderManager.js"></script>
    </head>
</html>

<?php require($templateParams["pageMainNav"]); ?>


<body>

    <div class="row col-12">
        
        <!-- merchandising-->
        <?php require($templateParams["pageMainSection"]); ?>  
        <?php require($templateParams["pageSecondarySection"]); ?>
    </div>
</body>