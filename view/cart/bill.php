<section id="cart-add" class="section-p1">
        <div id="subtotal">         
            <?php
                if(isset($bill)&&(is_array($bill))){
                    extract($bill);
                }
            ?>    
            <h3>Order Information</h3>
                <table>
                <tr>
                                    <td>Bill Code</td>
                                    <td>BID-<?=$bill['ID']?></td> 
                                </tr>
                                <tr>
                                    <td>Receiver</td>
                                    <td><?=$bill['Name']?></td> 
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?=$bill['Address']?></td> 
                                </tr>
                                <tr>
                                    <td>Tel</td>
                                    <td><?=$bill['Tel']?></td> 
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?=$bill['Email']?></td> 
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td><?=$bill['Date']?></td> 
                                </tr>
                                <tr>
                                    <td>Total Bill</td>
                                    <td><?=$bill['Totalbill']?></td> 
                                </tr>  
                                <tr>
                                    <td>Method</td>
                                    <td><?=$bill['Method']?></td> 
                                </tr>                                   
                    </table>

                    <h3>Cart Details</h3>
                    <table>          
                        <tr>
                            <th>No.</th>
                            <th>Img</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>                                      
                        </tr>
                        <?php
                            show_bill($billdt);
                        ?>
                    </table>
                    <h1><strong>Thank you!!!</strong></h1>                   
        </div>
    </section>