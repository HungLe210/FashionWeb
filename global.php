<?php
    $Imgpath="upload/";

    function RenderProduct($product){
        global $Imgpath;
        extract($product);
        $hinh=$Imgpath.$Img;
        $linkprod="index.php?act=product&idprod=".$ID;
        $CateName=load_catename($IDCate);
                        echo '
                        <div class="pro" onclick="window.location.href=\'' . $linkprod . '\'">
                            <img src="'.$hinh.'" alt="">
                            <div class="des">
                                <span>'.$CateName.'</span>
                                <h5>'.$Name.'</h5>
                                <div class="star">
                                    <i class="fas fa-star   "></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4>'.$Price.'</h4>
                            </div>
                            <a href="#"><i class ="fas fa-shopping-cart cart"></i></a>
                        </div>';
    }        
?>