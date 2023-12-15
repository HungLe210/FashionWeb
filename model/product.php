<?php

function insert_prod($tenloai, $giasp, $hinh,$mota,$idcate){
    $sql="insert into product(Name,Price,Img,Descrp,IDCate) values('$tenloai','$giasp','$hinh','$mota','$idcate')";
    pdo_execute($sql);
}

function delete_prod($id){
    $sql= "delete from product where ID=".$id;
    pdo_execute($sql);
}
function load_all_prod($kyw,$idcate){
    
    $sql="select * from product where 1";
    if($kyw!=""){
        $sql.=" and Name like '%".$kyw."%'";
    }
    if($idcate>0){
        $sql.=" and IDCate ='".$idcate."'";
    }
    $sql.= " order by ID";
    $listprod= pdo_query($sql);
    return $listprod;
}

function get_prod($id){
    $sql= "select * from product where id=".$id;
    $prod=pdo_query_one($sql);
    return $prod;
}
function update_prod($id,$idcate,$tensp,$giasp,$mota,$hinh){
    if($hinh!="")
        $sql="UPDATE product set Name='".$tensp."' , Price='".$giasp."', Descrp='".$mota."',Img='".$hinh."', IDCate=' ".$idcate."' where ID=".$id;
    else
        $sql="UPDATE product set Name='".$tensp."' , Price='".$giasp."', Descrp='".$mota."', IDCate=' ".$idcate."' where ID=".$id;
    pdo_execute($sql);
}

?>