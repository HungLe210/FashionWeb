<?php

function insert_cate($tenloai){
    $sql="insert into category(Name) values('$tenloai')";
    pdo_execute($sql);
}

function delete_cate($id){
    $sql= "delete from category where id=".$id;
    pdo_execute($sql);
}
function load_all_cate(){
    $sql="select * from category order by ID";
    $listcate= pdo_query($sql);
    return $listcate;
}

function get_one($id){
    $sql= "select * from category where id=".$id;
    $cate=pdo_query_one($sql);
    return $cate;
}
function update_cate($id,$tenloai){}
function delete_cate_by_id($id){}

?>