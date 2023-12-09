<?php
    include "view/header.php";

    $action = isset($_GET['act']) ? $_GET['act'] : 'default';

    switch ($action) {
        case 'about':
            include "view/about.php";
            break;
        case 'shop':
            include "view/shop.php";
            break;
        case 'contact':
            include "view/contact.php";
            break;    
        default:
            include "view/home.php";
            break;
    }    

    include "view/footer.php";   
?>