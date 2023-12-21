<section id="prodetails" class="section-p1">
        <?php
            extract($prod);
            $hinh=$Imgpath.$Img;
            $CateName=load_catename($IDCate);
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
                    <input type="number" value="1">
                    <button class="normal">Add To Cart</button>
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