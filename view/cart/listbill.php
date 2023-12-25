<section id="wrapper">
    <section id="cart-add" class="section-p1">
        <div id="subtotal">         
                       <h3>Track Your Orders</h3>
                    <table>          
                        <tr>
                            <th>Bill Code</th>
                            <th>Date Confirm</th>
                            <th>Amount of Product</th>
                            <th>Total Price</th>
                            <th>Status</th>                                      
                        </tr>
                        <?php
                            if(is_array($listbill)){
                                foreach ($listbill as $bill){
                                    extract($bill);
                                    $bill_status=get_status($bill['Status']);
                                    $count=count_all_cart($bill['ID']);
                                    echo'<tr>
                                            <td>BID-'.$bill['ID'].'</td>
                                            <td>'.$bill['Date'].'</td>
                                            <td>'.$count.'</td>
                                            <td>'.$bill['Totalbill'].'$</td>
                                            <td>'.$bill_status.'</td>
                                    ';
                                }
                                
                            }
                        ?>    
                    </table>                   
        </div>
    </section>
</section>