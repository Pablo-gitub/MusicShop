    <div class="container">

        <!-- Heading -->
        <h1 class="my-3 text-center">Checkout</h1>

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-8 mb-4">

                <!--Card-->
                <div class="card">

                    <!--Card content-->
                    <form class="card-body" action="" method="post">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">

                                <!--firstName-->
                                <div class="md-form ">
                                    <label for="Nome">Name</label>
                                    <input type="text" id="Nome" name="nome" class="form-control" value="<?php echo $user['Nome'] ?>" maxlength="29" required>
                                </div>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">

                                <!--lastName-->
                                <div class="md-form">
                                    <label for="Cognome">Surname</label>
                                    <input type="text" id="Cognome" name="cognome" class="form-control" value="<?php echo $user['Cognome']?>" maxlength="29" required>
                                </div>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--address-->
                        <div class="md-form mb-2">
                            <label for="indirizzo">Delivery Address</label>
                            <input type="text" id="indirizzo" name="indirizzo" class="form-control" value="<?php echo $user['Indirizzo']?>" maxlength="29" required>
                        </div>

                        <!--Grid row-->
                        <div class="row">
                            
                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-4">

                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity" name="citta" value="<?php echo $user['Citta']?>" maxlength="29" required>

                            </div>
                            <!--Grid column-->


                            <!--Grid column-->
                            <div class="col-lg-4 col-md-12 mb-4">

                                <label for="Paese">State</label>
                                <select class="custom-select d-block w-100" id="Paese" name="stato" required>
                                    <option value="Italy" label="Italy" selected>Italy</option>
                                    <option value="Albania" label="Albania">Albania</option>
                                    <option value="Andorra" label="Andorra">Andorra</option>
                                    <option value="Austria" label="Austria">Austria</option>
                                    <option value="Belarus" label="Belarus">Belarus</option>
                                    <option value="Belgium" label="Belgium">Belgium</option>
                                    <option value="Bulgaria" label="Bulgaria">Bulgaria</option>
                                    <option value="Croatia" label="Croatia">Croatia</option>
                                    <option value="Cyprus" label="Cyprus">Cyprus</option>
                                    <option value="Czech Republic" label="Czech Republic">Czech Republic</option>
                                    <option value="Denmark" label="Denmark">Denmark</option>
                                    <option value="Estonia" label="Estonia">Estonia</option>
                                    <option value="Finland" label="Finland">Finland</option>
                                    <option value="France" label="France">France</option>
                                    <option value="Germany" label="Germany">Germany</option>
                                    <option value="Gibraltar" label="Gibraltar">Gibraltar</option>
                                    <option value="Greece" label="Greece">Greece</option>
                                    <option value="Guernsey" label="Guernsey">Guernsey</option>
                                    <option value="Hungary" label="Hungary">Hungary</option>
                                    <option value="Iceland" label="Iceland">Iceland</option>
                                    <option value="Ireland" label="Ireland">Ireland</option>
                                    <option value="Jersey" label="Jersey">Jersey</option>
                                    <option value="Latvia" label="Latvia">Latvia</option>
                                    <option value="Liechtenstein" label="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania" label="Lithuania">Lithuania</option>
                                    <option value="Luxembourg" label="Luxembourg">Luxembourg</option>
                                    <option value="Macedonia" label="Macedonia">Macedonia</option>
                                    <option value="Malta" label="Malta">Malta</option>
                                    <option value="Moldova" label="Moldova">Moldova</option>
                                    <option value="Monaco" label="Monaco">Monaco</option>
                                    <option value="Montenegro" label="Montenegro">Montenegro</option>
                                    <option value="Netherlands" label="Netherlands">Netherlands</option>
                                    <option value="Norway" label="Norway">Norway</option>
                                    <option value="Poland" label="Poland">Poland</option>
                                    <option value="Portugal" label="Portugal">Portugal</option>
                                    <option value="Romania" label="Romania">Romania</option>
                                    <option value="Russia" label="Russia">Russia</option>
                                    <option value="San Marino" label="San Marino">San Marino</option>
                                    <option value="Serbia" label="Serbia">Serbia</option>
                                    <option value="Slovakia" label="Slovakia">Slovakia</option>
                                    <option value="Slovenia" label="Slovenia">Slovenia</option>
                                    <option value="Spain" label="Spain">Spain</option>
                                    <option value="Sweden" label="Sweden">Sweden</option>
                                    <option value="Switzerland" label="Switzerland">Switzerland</option>
                                    <option value="Ukraine" label="Ukraine">Ukraine</option>
                                    <option value="United Kingdom" label="United Kingdom">United Kingdom</option>
                                    <option value="Vatican City" label="Vatican City">Vatican City</option>
                                  <option disabled></option>
                                </select>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-4">

                                <label for="CAP">ZIP</label>
                                <input type="text" class="form-control" id="CAP" name="zip" value="<?php echo $user['CodP']?>" minlength="5" maxlength="5" required>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <hr>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Credit Card Number</label>
                                <input type="text" class="form-control" id="cc-name" name="ccnumber" value="<?php echo $user['CCNumero']?>" minlength="11" maxlength="16" pattern="[0-9]{11,16}" required>
                                
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Expiration Date</label>
                                <input type="text" class="form-control" id="cc-number" name="ccexp" value="<?php echo $user['CCScadenza']?>" required>
                                
                            </div>
                        
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" name="cccvv" value="<?php echo $user['CCVV']?>" minlength="3" maxlength="3" required>
                                
                            </div>
                        </div>

                        <hr class="mb-4">
                        
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Place Order</button>

                    </form>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4">

                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Cart</span>
                </h4>

                <!-- Cart -->
                <?php foreach ($cartItem as $item) :                    
                        $album = $dbh->getAlbumFromId($item['AlbumId']);
                        $album = $album[0];
                ?>
                <ul class="list-group mb-3 z-depth-1">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <p class="my-0">
                                <strong><?php echo $album['Titolo']; echo ' x'; echo$item['Quantità'] ?></strong>
                            </p>
                        </div>
                        <?php
                            $itemPrice = $album["Prezzo"] * $item['Quantità'];
                            $amount += $itemPrice;
                            $tot += $amount;
                        ?>
                        <span class="text-muted"><?php echo $amount ?> €</span>
                        <?php $amount = 0 ?>
                    </li>
                <?php endforeach ?>    

                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <p class="my-0"><strong>VAT</strong></p>
                        </div>
                        <span class="text-muted"><?php echo $tot*0.22 ?> €</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <p class="my-0"><strong>Shipping costs</strong></p>
                        </div>
                        <span class="text-muted">FREE</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span><strong>Total</strong></span>
                        <strong><?php echo $tot*1.22 ?> €</strong>
                    </li>
                </ul>
                <!-- Cart -->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>