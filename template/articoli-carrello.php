<div class="mb-3 pt-4">

  <h2 class="mb-4">Shopping Cart</h2>
  
  <?php foreach ($cartItem as $item) :
  
    $album = $dbh->getAlbumFromId($item['AlbumId']);
    $album = $album[0];
    
    $itemPrice = $album["Prezzo"] * $item['Quantità'];
    $amount += $itemPrice;
  ?>

  <div class="row mb-4 item">
    <div class="col-md-5 mb-3 col-lg-3 col-xl-3">
        <img class="w-100" src="<?php echo UPLOAD_DIR; ?>/<?php echo $album["Imgalbum"]; ?>" alt="album" name="<?php echo $_SESSION['Username']; ?>">
    </div>
    <div class="col-md-7 col-lg-9 col-xl-9">
      <div class="row">
        <div class="col-8">
          <h3 class="h4 pt-2"><?php echo $album["Band"]; ?>, <?php echo $album["Titolo"]; ?></h3>
        </div>
        <div class="col-4 pt-3">
          <div class="row">
            <div class="input-group">
              <button name="down" value="<?php echo $album["Id"]; ?>" class="input-group-prepend bg-dark text-white">-</button>
              <label class="d-none" for="quantity" class="pass-quantity">Stock</label>
              <input id="quantity<?php echo $album["Id"]; ?>"  class="quantity h-100" min="1" max="<?php echo $album['Rimanenza']; ?>" name="quantity" value="<?php echo $item['Quantità']; ?>" type="number">
              <button name="up" value="<?php echo $album["Id"]; ?>" class="input-group-append bg-dark text-white">+</button>                                 
            </div>
          </div>
          
          <p class="pt-1 text-center"><span><strong id="summary" class="product-line-price"><?php echo $itemPrice; ?>€</strong></span></p>
        </div>
        <p class="mb-3 ml-3 text-muted text-uppercase small"><?php echo $album["Descrizione"]; ?></p>
        <div class="remove-item ml-3 align-items-center">
          <a name="deleteitem" title="<?php echo $album['Id']; ?>" type="button" class="card-link-secondary small text-uppercase text-danger mr-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg> Remove</a>
        </div>
      </div>
    </div>
  </div>

  <hr class="mb-4">
  <?php endforeach ?>
    

</div>