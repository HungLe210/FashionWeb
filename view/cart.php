<section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>                   
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($thongbao)&& ($thongbao!="")){
                        echo $thongbao;
                    }
                    $totalbill=0;
                    $i=0;

                    foreach($_SESSION['mycart'] as $cart){
                        $hinh=$Imgpath.$cart[2];
                        $totalbill+=$cart[5];
                        $i+=1; 
                        echo'<tr>
                            <td><a href="index.php?act=delcart&idcart='.$i.'"><i class="far fa-times-circle"></i></a></td>
                            <td><img src="'.$hinh.'" alt="" height="80px"></td>
                            <td>'.$cart[1].'</td>
                            <td>'.$cart[3].'</td>
                            <td>'.$cart[4].'</td>
                            <td>'.$cart[5].'</td>   
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
    </section>
    
    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter Your Coupon">
                <button class="normal">Apply</button>
            </div>
        </div>

        <div id="subtotal">
            <?php
                        echo'<h3>Cart Totals</h3>
                            <table>
                            <tr>
                                <td>Cart Subtotal</td>
                                <td>'.$totalbill.'</td>            
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>0</td>                                       
                            </tr>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td><strong>'.$totalbill.'</strong></td>
                            </tr>
                        </table>';
            ?>
            
            <button class="normal">Proceed to checkout</button>
        </div>
    </section>