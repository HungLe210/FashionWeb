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
    function check_email($Email){
        $sql= "select * from account where Email='".$Email."'";
        $rs=pdo_query_one($sql);
        return $rs;
    }
    function update_acc($ID,$Pass,$Email,$Address,$Tel){
        $sql="UPDATE account set Pass='".$Pass."', Email='".$Email."', Address='".$Address."', Tel='".$Tel."' where ID= ".$ID   ;
        pdo_execute($sql);
    }
    function load_all_acc(){
        $sql="select * from account order by ID";
        $listacc= pdo_query($sql);
        return $listacc;
    }
?>

