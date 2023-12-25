   <section id="shop" class="section-p1">
        <div id="menu">
            <form action="index.php?act=shop" method="post">
                <input type="text" name ="kyw" class="kyw-input" placeholder="Keyword">
                <input type="submit" name ="find" value="Search">
            </form>
            <ul class="navbar">
                <li><a href="index.php?act=shop">All</a></li><br>
                <?php
                    foreach($listcate as $category){
                        extract($category);
                        $shopcate="index.php?act=shop&idcate=".$ID;
                        echo '<li><a href="'.$shopcate.'">'.$Name.'</a></li>';
                    }
                ?>            
           </ul>  
        </div>
       <section id="product1" class="section-p1 " > 
           <div class="pro-container">          
                <?php
                    foreach($listprod as $product) {
                     RenderProduct($product);
                    }
                ?>
           </div>
       </section>
   </section>
   
   
   <!-- <section id="pagination" class="section-p1">
       <a href="#">1</a>
       <a href="#">2</a>
       <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
   </section> -->
