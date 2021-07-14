<div class="d-flex justify-content-left h-100 col-12 col-md-7 col-lg-7 col-xl-7">
    <section class="col-12">   
        <!-- Default form register -->
        <form id="pdata" class="border border-light py-5" action="" method="post">        

            <h1 class="h1 mb-4">Account</h1>
            <h2 class="h4 mb-4">Personal data</h2>

            <div class="form-row mb-4">
                <div class="col">
                <!-- First name -->
                <label for="acnome">Name</label>
                <input type="text" id="acnome" name="nome" class="form-control" value="<?php echo $user['Nome']?>">
                </div>
                <div class="col">
                <!-- Last name -->
                <label for="accognome">Surname</label>
                <input type="text" id="accognome" name="cognome" class="form-control" value="<?php echo $user['Cognome']?>">
                </div>
            </div>

            <div class="form-group">
                <label for="acaddress">Address</label>
                <input type="text" id="acaddress" class="form-control" name="indirizzo" value="<?php echo $user['Indirizzo']?>">
            </div>
            <div class="form-row">

                <div class="form-group col-md-6">
                <label for="accity">City</label>
                <input type="text" class="form-control" id="accity" name="citta" value="<?php echo $user['Citta']?>">
                </div>
                
                <div class="form-group col-md-2">
                <label for="aczip">ZIP</label>
                <input type="text" class="form-control" id="aczip" name="zip" value="<?php echo $user['CodP']?>" >
                </div>
                
                <div class="form-group col-md-4 mb-4">
                    <label for="acstate">State</label>
                    <select class="form-control" id="acstate" name="stato" required>
                        <option value="IT" label="Italy" selected>Italy</option>
                        <option disabled> </option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <button class="btn btn-dark" type="submit">Update</button>
                </div>
            </div>

        </form>      

        <hr>
        
        <form id="ccdata" class="border border-light py-5" action="" method="post">        
            
            <h2 class="h4 mb-4">Credit Card Data</h2>

            <div class="form-row">
                <div class="col col-md-6">
                    <label for="acccnumber">Credit Card Number</label>
                    <input type="text" class="form-control" id="acccnumber" name="ccnumber" value="<?php echo $user['CCNumero']?>" required>
                    
                </div>

                <div class="col col-md-6">
                    <label for="acccexp">Expiration Date</label>
                    <input type="text" class="form-control" id="acccexp" name="ccexp" value="<?php echo $user['CCScadenza']?>" required>
                    
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3 mb-4">
                    <label for="accccvv">CVV</label>
                    <input type="text" class="form-control" id="accccvv" name="cccvv" value="<?php echo $user['CCVV']?>" required>
                    
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <button class="btn btn-dark" type="submit">Update</button>
                </div>
            </div>

        </form>

        <hr>

    </section>
</div>

<aside class="col-12 col-md-5 col-lg-5 col-xl-5 pt-2">
    <div class="mb-3 pt-4 table-responsive-md">
        <h5 class="mb-3">Orders</h5>     
        <table class="table table-striped" summary="Nella tabella vengono visualizzati gli ordini effettuati. Ogni riga identifica l'ordine tramite Id ordine, Id cliente, totale spesa e data. Inoltre facendo click sulla riga relativa a un ordine si aprirà una tabella sottostante contente i suoi dettagli">
            
            <caption class="sr-only">Orders</caption>

            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <tbody class="text">

                <?php foreach ($orders as $order) : ?>
                <?php $orderItems = $dbh->getOrderItems($order['Id']) ?>

                <tr>
                    <td data-toggle="collapse" data-target="#ordine<?php echo $order['Id'] ?>"><?php echo $order["Id"]; ?></td>
                    <td data-toggle="collapse" data-target="#ordine<?php echo $order['Id'] ?>"><?php echo ($order["Importo"]); ?>€</td>
                    <td data-toggle="collapse" data-target="#ordine<?php echo $order['Id'] ?>"><?php echo $order["Data"]; ?></td>
                    <td data-toggle="collapse" data-target="#ordine<?php echo $order['Id'] ?>">
                        <?php 
                            
                            if ($order['Status'] == 1) {
                            
                                echo 'Processing';
                            } else { 

                                if ($order['Status'] == 2) {

                                    echo 'Delivering';
                                } else {

                                    if ($order['Status'] == 3) {

                                        echo 'Delivered';
                                    } else {

                                        if ($order['Status'] == 4) {

                                            echo 'Cancelled';
                                        } else {

                                            echo '';
                                        }
                                    }
                                } 
                            }  
                    
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="hiddenRow" colspan="12">
                        <div id="ordine<?php echo $order['Id'] ?>" class="accordian-body collapse" > 
                            
                            <table class="table table-striped" summary="Nella tabella vengono visualizzati i dettagli dell'ordine del cliente. Ogni riga identifica il prodotto ordinato tramite id, nome, quantità, prezzo al singolo e prezzo totale quantità per prodotto">
                                
                                <caption class="d-none">Details</caption>
                                <thead>
                                    <tr class="info">
                                        <th scope="col">Album</th>
                                        <th scope="col">Base Price</th>		
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>	
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($orderItems as $item) : 
                                        
                                        $album = $dbh->getAlbumFromId($item['AlbumId']); 
                                        $album = $album[0];
                                    ?>
                                    <tr>
                                        <td><?php echo $album['Titolo'] ?></td>
                                        <td><?php echo $album['Prezzo'] ?>€</td>
                                        <td><?php echo $item['Quantità'] ?></td>
                                        <td><?php echo (($item['Quantità'] * $album['Prezzo'])*1.22) ?>€</td>
                                    </tr>

                                    <?php endforeach ?>

                                </tbody>
                            </table>
                            
                        </div>
                    </td>
                </tr>
                            
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</aside>

