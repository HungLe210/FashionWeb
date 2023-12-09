<?php
    include "header.php";
    include "../model/pdo.php";
    include "../model/category.php";

    if(isset($_GET["act"])){
        $act=$_GET["act"];
        switch ($act){
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

            case 'dlcate':
                if(($_GET['id']) && ($_GET['id']>0)){
                    delete_cate($_GET['id']);
                }
                
                $listcate= load_all_cate();
                include'category/list.php';
                break;

            case 'edcate':
                if(($_GET['id']) && ($_GET['id']>0)){
                    get_one($_GET['id']);
                }
                include 'category/update.php';
                break;

            case 'updtcate':
                if(isset($_POST['updt']) && ($_POST['updt'])){                    
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                 
                    $sql="UPDATE category set Name='".$tenloai."' where id=".$id;

                    pdo_execute($sql);
                    $thongbao="Cập nhật thành công";                
                }
                
                $listcate= load_all_cate();
                include'category/list.php';
                break;

            case 'addpd':
                include 'product/add.php';
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