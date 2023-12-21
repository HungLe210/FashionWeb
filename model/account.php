<?php
    function insert_acc($Email,$User,$Pass){
        $sql="insert into account(Email,User,Pass) values('$Email','$User','$Pass')";
        pdo_execute($sql);
    }    
    function check_user($User,$Pass){
        $sql= "select * from account where User='".$User."' AND Pass='".$Pass."'";
        $acc=pdo_query_one($sql);
        return $acc;
    }
?>

