<?php
    include "header.php";
    include "../model/pdo.php";
    include "../model/category.php";
    include "../model/product.php";
    include "../model/account.php";
    include "../model/cart.php";
    include "condition.php";

    if(isset($_GET["act"])){
        $act=$_GET["act"];
        switch ($act){

            /* Category Controller */
            case 'addcate':
                if(isset($_POST['add']) && ($_POST['add'])){                    
                    $tenloai=$_POST['tenloai'];
                    if($tenloai!=''){
                    insert_cate($tenloai);
                    $thongbao="Thêm thành công";
                    }else   
                        $thongbao= "Chưa nhập dữ liệu";
                }
                include "category/add.php";
                break;

            case 'lscate':
                $listcate=load_all_cate();
                
                include 'category/list.php';
                break;

            case 'delcate':
                if(($_GET['id']) && ($_GET['id']>0)){
                    delete_cate($_GET['id']);
                }
                
                $listcate= load_all_cate();
                include'category/list.php';
                break;

            case 'edcate':
                if(($_GET['id']) && ($_GET['id']>0)){
                    $cate=get_cate($_GET['id']);
                }
                include 'category/update.php';
                break;

            case 'updtcate':
                if(isset($_POST['updt']) && ($_POST['updt'])){                    
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    update_cate($id, $tenloai);
                 
                    
                    $thongbao="Cập nhật thành công";                
                }
                
                $listcate= load_all_cate();
                include'category/list.php';
                break;

            
            /* Product Controller*/
            case 'addprod':
                if(isset($_POST['add']) && ($_POST['add'])){        
                    $idcate=$_POST['idcate'];            
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                      } else {
                        //echo "Sorry, there was an error uploading your file.";
                      }


                    if($tensp!=''){
                    insert_prod($tensp,$giasp,$hinh,$mota,$idcate);
                    $thongbao="Thêm thành công";
                    }else   
                        $thongbao= "Chưa nhập dữ liệu";
                }
                $listcate= load_all_cate();
                include "product/add.php";
                break;

            case 'lsprod':
                if(isset($_POST['listok']) && ($_POST['listok']))
                {
                    $kyw=$_POST['kyw'];
                    $idcate=$_POST['idcate'];
                }else{
                    $kyw='';
                    $idcate=0;
                }
                $listcate=load_all_cate();
                $listprod=load_all_prod($kyw,$idcate);                               
                include 'product/list.php';
                break;

            case 'delprod':
                if(($_GET['id']) && ($_GET['id']>0)){
                    delete_prod($_GET['id']);
                }
                $listprod= load_all_prod("",0);
                include'product/list.php';
                break;

            case 'edprod':
                if(($_GET['id']) && ($_GET['id']>0)){
                    $prod=get_prod($_GET['id']);
                }
                $listcate=load_all_cate();
                include 'product/update.php';
                break;

            case 'updtprod':
                if(isset($_POST['updt']) && ($_POST['updt'])){    
                    $id=$_POST['id'];          
                    $idcate=$_POST['idcate'];            
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                      } else {
                        //echo "Sorry, there was an error uploading your file.";
                      }        
                    update_prod($id,$idcate,$tensp,$giasp,$mota,$hinh);     
                }
                $listcate= load_all_cate();
                $listprod= load_all_prod("",0);
                include'product/list.php';
                break;
            
            /* Admin Controller*/

            case 'lsacc':
                    $listacc=load_all_acc();                    
                    include 'account/list.php';
                    break;
            case 'listbill':
                    if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                        $kyw=$_POST['kyw'];
                    }else { $kyw="";}
                    $listbill=load_all_bill($kyw,0);
                    include "bill/list.php";
                    break;   
            case 'delbill':
                if(($_GET['id']) && ($_GET['id']>0)){
                    delete_bill($_GET['id']);
                }
                $listprod= load_all_prod("",0);
                include'product/list.php';
                break;
                    
            
            default:
                include 'home.php';
                break;
        }
    }else{
        include "home.php";
    }
    include "footer.php";
?>