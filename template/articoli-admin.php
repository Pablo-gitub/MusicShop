<section class="col-12 col-md-7 col-lg-7 col-xl-7">
    <div class="mb-3 pt-4">
        <h2 class="mb-4">Warehouse</h2>
            <div class="row mb-4">
                <div class="col-md-5 col-lg-3 col-xl-3">
                    <div class="mb-3">
                        <img class="w-100" src="<?php echo UPLOAD_DIR; ?>/PlaceHolder.jpg" alt="Placeholder">
                    </div>
                    <div class="form-group">
                        <label for="LinkImmagine">Image</label>
                        <input type="text" class="form-control" id="LinkImmagine" name="img" placeholder="PlaceHolder.jpg">
                    </div>
                </div>
                <div class="col-md-7 col-lg-9 col-xl-9">
                    
                    <div class="row">
                        
                        <div class="col-7">

                            <div class="form-group">
                                <label for="titolo articolo">Title</label>
                                <input type="text" class="form-control form-control-lg" id="titolo articolo" name="title" placeholder="Enter a title">
                            </div>

                            <div class="form-group">
                                <label for="band">Band</label>
                                <input type="text" class="form-control form-control-lg" id="band" name="band" placeholder="Enter a name">
                            </div>

                            <div class="form-group">
                                <label for="Descrizione prodotto">Description</label>
                                <textarea class="form-control" id="Descrizione prodotto" name="desc" rows="3" placeholder="Enter a description"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="date1">Release year</label>
                                <input class="form-control it-date-datepicker" id="date1" name="year" type="text" placeholder="E.g. 1900">
                            </div>

                            <div class="form-group">
                                <label for="Genere">Genre</label>
                                <input type="text" class="form-control" id="Genere" name="genre" name="Genere" placeholder="E.g. Rock">
                            </div>
                        </div>

                        <div class="col-5">
                            <label for="quantity">Stock</label>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn-sm bg-dark text-white">-</button>
                                    <input class="text form-control" type="number" id="quantity" name="quantity" min="1" value="1">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn-sm bg-dark text-white">+</button>                                 
                                </div>
                            </div>
                            

                            <label for="prezzo">Price €</label>
                            <div class="input-group mb-4">
                                <input type="text" class="text form-control" id="prezzo" name="price" placeholder="*">
                            </div>

                            <div class="pt-4">
                                <button class="btn btn-block btn-dark" type="button" id="tolist">Add</button>
                            </div> 

                        </div>

                    </div>
                    
                </div>
            </div>

        <hr class="mb-4">
        <?php foreach ($collection as $album) : ?>
            <div class="row mb-4">
                    <div class="col-md-5 col-lg-3 col-xl-3">
                        <div class="mb-3">
                            <img class="w-100" src="<?php echo $album["Imgalbum"]; ?>" alt="Album <?php echo $album["Band"]; ?>, <?php echo $album["Titolo"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="LinkImmagine">Image</label>
                            <input type="text" class="form-control" id="img<?php echo $album["Id"]?>" value="<?php echo $album["Imgalbum"]; ?>">
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-9 col-xl-9">
                        <div class="row">
                            
                            <div class="col-7">

                                <div class="form-group">
                                    <label for="titolo articolo">Title</label>
                                    <input type="text" class="form-control form-control-lg" id="title<?php echo $album["Id"]?>" value="<?php echo $album["Titolo"]; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="band">Band</label>
                                    <input type="text" class="form-control form-control-lg" id="band<?php echo $album["Id"]?>" value="<?php echo $album["Band"]; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="Descrizione prodotto">Description</label>
                                    <textarea class="form-control" id="desc<?php echo $album["Id"]?>" rows="3"><?php echo $album["Descrizione"]; ?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="date1">Release Year</label>
                                    <input class="form-control it-date-datepicker" id="year<?php echo $album["Id"]?>" type="text" placeholder="aaaa" value="<?php echo $album["Anno"]; ?>">

                                    <label for="Genere">Genre</label>
                                    <input type="text" class="form-control" id="genre<?php echo $album["Id"]?>" value="<?php echo $album["Genere"]; ?>">
                                </div>
                            </div>

                            <div class="col-5">
                                
                                <label for="quantity<?php echo $album["Id"]?>">Stock</label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn-sm bg-dark text-white">-</button>
                                        <input class="text form-control" type="number" name=quantity id="quantity<?php echo $album["Id"]?>" min="0" value="<?php echo $album['Rimanenza']; ?>">
                                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn-sm bg-dark text-white">+</button>                                 
                                    </div>
                                </div>
                                
                                <label for="price<?php echo $album["Id"]?>">Price €</label>
                                <div class="form-group mb-4">
                                    <input type="text" class="text form-control" id="price<?php echo $album["Id"]?>" name="price" value="<?php echo $album["Prezzo"]; ?>">
                                </div>

                                <div class="pt-4">
                                    <button class="btn btn-block btn-dark" type="button" name="updatelist" value="<?php echo $album["Id"] ?>">Update</button>
                                    
                                </div> 
                                
                                <div class="form-group pt-3">
                                    
                                    <button type="button" class="btn small text-uppercase text-danger mr-3" name="deleteItem" title="<?php echo $album["Id"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg> Delete</button>    
                                     
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <hr class="mb-4">
        <?php endforeach ?>
        <div id="snackbar"></div>
    </div>
</section>