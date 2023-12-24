<?php
    session_start();
    include "model/pdo.php";
    include "model/product.php";
    include "model/category.php";
    include "model/account.php";
    include "view/header.php";
    include "global.php";

    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

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
                    $checkuser=check_user($User,$Pass);
                    if (is_array($checkuser))
                    {
                        $_SESSION['user']=$checkuser;
                        header('Location: index.php');                        
                    }else
                        $thongbao="Account doesn't exist or typing wrong password. Check again or let's register!";                    
                }
                include "view/account/login.php";
                break;
            case 'updtacc':
                if(isset($_POST['updt']) &&($_POST['updt'])){
                    $User=$_POST['user'];
                    $Pass=$_POST['pass'];
                    $Email=$_POST['email'];
                    $Address=$_POST['address'];
                    $Tel=$_POST['tel'];
                    $ID=$_POST['id'];
                    update_acc($ID,$Pass,$Email,$Address,$Tel);
                    $_SESSION['user']=check_user($User,$Pass);
                    
                    header('Location: index.php?act=updtacc');  
                    $thongbao="Successfull!!!";          
                }
                include "view/account/update.php";
            break;    
            case 'regi':
                if(isset($_POST['regi']) &&($_POST['regi'])){
                    $Email=$_POST['email'];
                    $User=$_POST['user'];
                    $Pass=$_POST['pass'];
                    insert_acc($Email,$User,$Pass);
                    $thongbao="Register successfull. Please log in again!";
                }
                include "view/account/registry.php";
                break;
            case 'fgpw':
                if(isset($_POST['send']) &&($_POST['send'])){
                    $Email=$_POST['email'];
                    
                    $checkemail=check_email($Email);
                    if(is_array($checkemail)){
                        $thongbao="Your password is: ".$checkemail['Pass'];
                    }
                    else {
                        $thongbao="This email doesn't exist!!!";
                    }         
                }
                include "view/account/fgpass.php";
                break;
            case 'logout':
                session_unset();
                header('Location: index.php');
                break;


            /*--------------------- Cart------------------------*/
            case 'addtocart':
                if(isset($_POST['atc'])){
                    $ID=$_POST['id'];
                    $Name=$_POST['name'];
                    $Img=$_POST['img'];
                    $Price=$_POST['price'];
                    $Quantity=$_POST['num'];
                    $Total= $Quantity * $Price;
                    $prodadd=[$ID,$Name,$Img,$Price,$Quantity,$Total];

                    array_push($_SESSION['mycart'],$prodadd);
            
                }
                
                include "view/cart.php";
                break;
            case 'cart':
                include "view/cart.php";
                break;
            case 'delcart':
                if(isset($_GET['idcart'])){
                    $_SESSION['mycart']=array_slice($_SESSION['mycart'],$_GET['idcart'],1);                
                } else{
                    $_SESSION['mycart']=[];
                }
                header('Location: index.php?act=cart');                
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