<?php
    session_start();
    include "model/pdo.php";
    include "model/product.php";
    include "model/category.php";
    include "model/account.php";
    include "model/cart.php";

    include "view/header.php";

    include "global.php";

    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

    $newprod=load_prod_home();
    $listcate=load_all_cate();
    


    if((isset($_GET['act']) && $_GET['act'] != "")){
        $act=$_GET['act'];
        switch ($act) {

            case 'shop':
                if(isset($_POST['find'])){
                    if (!empty($_POST['kyw'])) 
                        $kyw=$_POST['kyw'];
                    else $kyw='';
                }else{
                    $kyw='';
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
                    $check=check_duplicate($User,$Email);
                    if(is_array($check)){
                        $thongbao="Username or Email has been used! Please try another.";
                    }else {insert_acc($Email,$User,$Pass);
                    $thongbao="Register successfull. Please log in again!";}    
                }
                include "view/account/registry.php";
                break;
            case 'fgpw':
                if(isset($_POST['send']) &&($_POST['send'])){
                    $User=$_POST['user'];
                    $Email=$_POST['email'];                    
                    $checkemail=check_email($User,$Email);
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

                    $fl=0; //kiem tra sp co trung trong gio hang khong?

                    for ($i=0; $i < sizeof($_SESSION['mycart']); $i++) { 
                        
                        if($_SESSION['mycart'][$i][1]==$Name){
                            var_dump($_SESSION['mycart']);
                            $fl=1;
                            $NewQtt=$Quantity+$_SESSION['mycart'][$i][4];
                            $_SESSION['mycart'][$i][4]=$NewQtt;
                            $_SESSION['mycart'][$i][5]= $NewQtt* $Price;
                            break;
                        }                        
                    }
                    //neu khong trung sp trong gio hang thi them moi
                    if($fl==0){
                        $prodadd=[$ID,$Name,$Img,$Price,$Quantity,$Total];
                        array_push($_SESSION['mycart'],$prodadd);
                    }               
                }
                
                header('Location: index.php?act=cart');
                break;
            case 'cart':
                include "view/cart.php";
                break;
            case 'delcart':
                if(isset($_GET['idcart'])){
                    array_splice($_SESSION['mycart'],$_GET['idcart'],1);       
                } else{
                    $_SESSION['mycart']=[];
                }         
                header('Location: index.php?act=cart');    
                break;
            case 'bill':
                if(isset($_POST['confirm'])){
                    if(sizeof($_SESSION['mycart'])>=1)
                    {
                        $IDUser=$_SESSION['user']['ID'];
                        $Name=$_POST['name'];
                        $Email=$_POST['email'];
                        $Address=$_POST['address'];
                        $Tel=$_POST['tel'];
                        $Method=0;
                        $Status=0;
                        $ConfirmDate=date('h:i:sa d/m/Y');
                        $Total=$_POST['totalbill'];
                    
                        $IDBill=insert_bill($IDUser,$Name,$Address,$Tel,$Email,$Total,$ConfirmDate,$Method,$Status);
                        foreach($_SESSION['mycart'] as $cart){
                            insert_cart($cart[0],$cart[1],$cart[2],$cart[3],$cart[4],$cart[5],$IDBill);
                        }if($IDBill>0){
                            $bill=get_bill($IDBill);
                            $billdt=load_all_cart($IDBill);}
                        include "view/cart/bill.php";  
                        $_SESSION['mycart']=[];
                    } else include "view/cart.php";
                }                           
                
                break;
            case 'lsbill':
                $listbill=load_all_bill('',$_SESSION['user']['ID']);
                include "view/cart/listbill.php";
                break;
            
                
            default:
                $newcate=get_new_cate();
                $listnewcate=load_all_prod("",$newcate['ID']); 
                include "view/home.php";
                break;
        }    
    } else {
        $newcate=get_new_cate();
        $listnewcate=load_all_prod("",$newcate['ID']); 
        include "view/home.php";
    }   
    include "view/footer.php";   
?>