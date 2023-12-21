<?php

function insert_cate($tenloai){
    $sql="insert into category(Name) values('$tenloai')";
    pdo_execute($sql);
}

function delete_cate($id){
    $sql= "delete from category where ID=".$id;
    pdo_execute($sql);
}
function load_all_cate(){
    $sql="select * from category order by ID";
    $listcate= pdo_query($sql);
    return $listcate;
}
function get_new_cate(){
    $sql="select * from product where 1 order by id desc limit 1";   
    $newcate=pdo_query($sql);
    return $newcate;
}

function get_cate($id){
    $sql= "select * from category where ID=".$id;
    $cate=pdo_query_one($sql);
    return $cate;
}
function update_cate($id,$tenloai){
    $sql="UPDATE category set Name='".$tenloai."' where ID=".$id;
    pdo_execute($sql);
}

?>