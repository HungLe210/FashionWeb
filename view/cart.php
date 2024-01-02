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
                <!-- Check user conditions: 1. Log In -> 2. Information of Telephone and Address? 
                If exist:    Export CART data, including: Detail Products and Delete Function for each product
                else: Notify the conditions to user
            -->
                <?php
                    if(isset($thongbao)&& ($thongbao!="")){
                        echo $thongbao;
                    }
                    $totalbill=0;
                    $i=0;
                    foreach($_SESSION['mycart'] as $cart){
                        $hinh=$Imgpath.$cart[2];
                        $totalbill+=$cart[5];
                        
                        echo'<tr>
                            <td><a href="index.php?act=delcart&idcart='.$i.'"><i class="far fa-times-circle"></i></a></td>
                            <td><img src="'.$hinh.'" alt="" height="80px"></td>
                            <td>'.$cart[1].'</td>
                            <td>'.$cart[3].'</td>
                            <td>'.$cart[4].'</td>
                            <td>'.$cart[5].'</td>                               
                        </tr>';
                        $i+=1; 
                    }
                ?>
            </tbody>
        </table>
    </section>
    
    <section id="cart-add" class="section-p1">
        <div id="subtotal">         
            <?php
                if (isset($_SESSION['user']))
                {
                    $name=$_SESSION['user']['User'];
                    $email=$_SESSION['user']['Email'];
                    $address=$_SESSION['user']['Address'];
                    $tel=$_SESSION['user']['Tel'];
                    if((!isset($address))||(!isset($tel))){
                        echo'<h1>Not have enough information. Please update your address/telephone on Account</h1>';
                    }else{
                        
                    //    Post data to confirm bill
                        echo'
                    <form action="index.php?act=bill" method="post">    
                        <h3>Order Information</h3>
                        <table>                    
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" name="name" value="'.$name.'"></td> 
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" name="email" value="'.$email.'"></td> 
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><input type="text" name="address" value="'.$address.'"></td> 
                                </tr>
                                <tr>
                                    <td>Tel</td>
                                    <td><input type="text" name="tel" value="'.$tel.'"></td> 
                                </tr>     
                        </table>
                        <input type="hidden" name="totalbill" value="'.$totalbill.'">
                        <h3>Cart Totals</h3>
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
                            <td>Total</td>
                            <td>'.$totalbill.'</td>
                        </tr>
                        </table>
                        
                        <a href="index.php?act=bill"><button type="submit" class="normal" name="confirm">Proceed to checkout</button></a>
                        <a href="index.php?act=delcart"><button class="normal">Delete cart</button></a>
                    </form>    
                    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="view/momopayment.php">
                        <input type="hidden" name="totalbill" value="'.$totalbill.'">   
                        <input type="submit" name="momo" value ="MOMO QRCode Payment">
                    </form>';
                    } 
                }else echo'<h1>Have to log in to use this function</h1>';
               
            ?>             
            
        </div>
    </section>