<section id="prodetails" class="section-p1">
        <?php
            extract($prod);
            $hinh=$Imgpath.$Img;
            $CateName=load_catename($IDCate);
            $linkprod="index.php?act=product&idprod=".$ID;
            echo'<div class="single-pro-image">
                    <img src="'.$hinh.'" width="100%" id="MainImg" alt="">
                    <div class="small-img-group">
                        <div class="small-img-col">
                            <img src="'.$hinh.'" width="100%" class="small-img" alt="">
                        </div>
                        <div class="small-img-col">
                            <img src="view/img/products/f2.jpg" width="100%" class="small-img" alt="">
                        </div>
                        <div class="small-img-col">
                            <img src="view/img/products/f3.jpg" width="100%" class="small-img" alt="">
                        </div>
                        <div class="small-img-col">
                            <img src="view/img/products/f4.jpg" width="100%" class="small-img" alt="">
                        </div>
                    </div>
                </div>

                <div class="single-pro-details">

                    <h6>'.$CateName.'</h6>
                    <h4>'.$Name.'</h4>
                    <h2>'.$Price.'</h2>
                    <select>
                        <option>Select Size</option>
                        <option>XXL</option>
                        <option>XL</option>
                        <option>M</option>
                        <option>S</option>
                    </select>
                   
                    <form action="index.php?act=addtocart" method="post">
                        <input type="number" name="num" value="1"><br>
                        <input type="hidden" name="id" value ="'.$ID.'">
                        <input type="hidden" name="name" value ="'.$Name.'">
                        <input type="hidden" name="img" value ="'.$Img.'">
                        <input type="hidden" name="price" value ="'.$Price.'"><br>
                     
                        
                        <button type="submit" name="atc" class="normal">Add To Cart</button>
                    </form>
                    <h4>Product Details</h4>
                    <span>'.$Descrp.'</span>

                </div>';
        ?>
</section>
    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[0].onclick = function(){
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function(){
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function(){
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function(){
            MainImg.src = smallimg[3].src;
        }
    </script>