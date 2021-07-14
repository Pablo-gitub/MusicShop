<aside class="col-12 col-md-5 col-lg-5 col-xl-5 pt-2">
    <div class="mb-3 pt-4 table-responsive-md">
        <h5 class="mb-3">Orders</h5>     
        <table class="table table-striped" summary="Nella tabella vengono visualizzati gli ordini effettuati dai clienti. Ogni riga identifica l'ordine tramite Id ordine, Id cliente, totale spesa, data e stato. Inoltre facendo click sulla riga relativa a un ordine si aprirà una tabella sottostante contente i suoi dettagli">
            
            <caption class="sr-only">Orders</caption>

            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">User</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <tbody class="text">

                <?php foreach ($orders as $order) : ?>
                <?php $orderItems = $dbh->getOrderItems($order['Id']) ?>

                <tr class="accordion-toggle">
                    <th data-toggle="collapse" data-target="#ordine<?php echo $order['Id'] ?>"><?php echo $order["Id"]; ?></th>
                    <td data-toggle="collapse" data-target="#ordine<?php echo $order['Id'] ?>"><?php echo $order["Username"]; ?></td>
                    <td data-toggle="collapse" data-target="#ordine<?php echo $order['Id'] ?>"><?php echo $order["Importo"]; ?>€</td>
                    <td data-toggle="collapse" data-target="#ordine<?php echo $order['Id'] ?>"><?php echo $order["Data"]; ?></td>
                    <td>
                        <select class="form-select" data-status="<?php echo $order['Status']; ?>" name="<?php echo $order['Id'] ?>">
                            <option value="1">Processing</option>
                            <option value="2">Delivering</option>
                            <option value="3">Delivered</option>
                            <option value="4">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="hiddenRow" colspan="12">
                        <div id="ordine<?php echo $order['Id'] ?>" class="accordian-body collapse" > 
                            
                            <table class="table table-striped" summary="Nella tabella vengono visualizzati i dettagli dell'ordine del cliente. Ogni riga identifica il prodotto ordinato tramite nome, prezzo base, quantità, prezzo totale">
                                
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

