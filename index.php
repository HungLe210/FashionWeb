<?php
    include "model/pdo.php";
    include "model/product.php";
    include "model/category.php";
    include "model/account.php";
    include "view/header.php";
    include "global.php";

    $newprod=load_prod_home();
    $listcate=load_all_cate();

    if((isset($_GET['act']) && $_GET['act'] != "")){
        $act=$_GET['act'];
        switch ($act) {

            case 'shop':
                if(isset($_GET['kyw']) && $_GET['kyw'] >0){
                    $kyw=$_GET['kyw'];

                }else{
                    $kyw="";
                }
                if(isset($_GET['idcate']) && $_GET['idcate'] >0){
                    $idcate=$_GET['idcate'];                    
                }else{
                    $idcate=0;
                }
                $listprod=load_all_prod($kyw,$idcate);
                $CateName=load_catename($idcate);
                include "view/shop.php";
                break; 

            case 'about':
                include "view/about.php";
                break;

            case 'product':
                if(isset($_GET['idprod']) && $_GET['idprod'] >0){
                    $idprod=$_GET['idprod'];
                    $prod=get_prod($idprod);
                    include "view/product.php";
                }else{
                    include "view/home.php";
                }
                break;

            case 'contact':
                include "view/contact.php";
                break;    

            /* Account*/
            case 'login':
                if(isset($_POST['login']) &&($_POST['login'])){
                    $User=$_POST['user'];
                    $Pass=$_POST['pass'];

                    $thongbao="Đã đăng ký thành công. Vui lòng đăng nhập để đặt hàng!";
                }
                include "view/account/login.php";
                break;
            case 'regi':
                if(isset($_POST['regi']) &&($_POST['regi'])){
                    $Email=$_POST['email'];
                    $User=$_POST['user'];
                    $Pass=$_POST['pass'];
                    $checkuser=check_user($User,$Pass);
                    if(is_array($checkuser))
                    $thongbao="Đã đăng ký thành công. Vui lòng đăng nhập để đặt hàng!";
                }
                include "view/account/registry.php";
                break;

            default:
                include "view/home.php";
                break;
        }    
    } else {
        include "view/home.php";
    }
        

    
    include "view/footer.php";   
?>