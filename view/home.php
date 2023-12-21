<section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deal</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off</p>
        <a href="index.php?act=shop"><button>Shop now</button></a>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="view/img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="view/img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="view/img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="view/img/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="view/img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="view/img/features/f6.png" alt="">
            <h6>F24/7 Support</h6>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Feature Products</h2>
        <p>New Morden Collections</p>
        <div class="pro-container">
            <?php
                foreach($newprod as $product) {
                    RenderProduct( $product );
                }
            ?>
        </div>
    
    </section>

    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% Off</span>  - All t-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>

    <section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>New Morden Design</p>
        <div class="pro-container">
            <?php
                foreach($newprod as $product) {
                    RenderProduct( $product );
                }
            ?>
        </div>
    
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic dress is on sale at Shop</span>
            <button class="white">Show More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcoming season</h2>
            <span>The best classic dress is on sale at Shop</span>
            <button class="white">Collection</button>
        </div>
    </section>

    <sectioN id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collections -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>Spring / Summer 2022</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
            <h3>New Trendy Prints</h3>
        </div>
    </sectioN>

