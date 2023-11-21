<?php
    include "view/header.php";
    switch ($_GET['act']) {
        case 'about':
            include "view/about.php";
            break;
        case 'shop':
            include "view/shop.php";
            break;
        default:
            include "view/home.php";
            break;
    }    

    include "view/footer.php";   
?>