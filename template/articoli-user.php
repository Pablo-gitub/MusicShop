<section class="col-12 col-md-8 col-lg-8 col-xl-9">
    <div id="albumlist" class="list-group">
        <?php foreach ($collection as $album) : 
            $cartQuantity = $dbh->getCartQuantity($_SESSION['Username'], $album['Id']);
            $cartQuantity = $cartQuantity[0][0];
        ?>
            <div class="list-group-item list-group-item-action m-2 border">
                <div <?php echo ($cartQuantity == $album['Rimanenza'] ? 'style="opacity:0.5"':''); ?> class="row">
                    <div class="col-12 col-md-4 col-xl-3 pt-2 text-center">
                        <img class="w-100 rounded" src="<?php echo $album["Imgalbum"]; ?>" alt="Album <?php echo $album["Band"]; ?>, <?php echo $album["Titolo"]; ?>">
                    </div>
                    <div id="itemProfile" class="pt-2 col-12 col-md-8 col-xl-9">
                        <h1><?php echo $album["Band"]; ?>, <?php echo $album["Titolo"]; ?></h1>
                        <p><?php echo $album["Descrizione"]; ?></p><br>

                        <div class="float-right" id="dati">
                            <div class="input-group">
                                <button <?php echo ($cartQuantity == $album['Rimanenza'] || !islogged() ? 'hidden':''); ?> type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="input-group-prepend bg-dark text-white">-</button>
                                <label class="sr-only" for="quantity">Stock</label>
                                <input <?php echo ($cartQuantity == $album['Rimanenza'] || !islogged() ? 'hidden':''); ?> class="text" type="number" id="tot<?php echo $album["Id"]; ?>" name="quantity" min="<?php echo ($cartQuantity==$album['Rimanenza'] ? 0:1); ?>" max="<?php echo ($cartQuantity==$album['Rimanenza'] ? 0 : $album['Rimanenza'] - $cartQuantity); ?>" value="<?php echo ($cartQuantity==$album['Rimanenza'] ? 0 : 1); ?>">
                                <button <?php echo ($cartQuantity == $album['Rimanenza'] || !islogged() ? 'hidden':''); ?> type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="bg-dark text-white input-group-append">+</button>                                 
                            </div>
                            <h2 style="margin-top:0.5rem"><?php echo ($cartQuantity == $album['Rimanenza'] ? "Sold out" : $album["Prezzo"]); ?><?php echo ($cartQuantity == $album['Rimanenza'] ? "" : "€"); ?></h2>
                            <button <?php echo ($cartQuantity == $album['Rimanenza'] || !islogged() ? 'disabled':''); ?> name="tocart" type="button" class="btn btn-success" value="<?php echo $album["Id"]; ?>">Add to cart <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path></svg></button>
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div id="snackbar"></div>
</section>