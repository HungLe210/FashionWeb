<?php
    function insert_cart($IDProd,$Name,$Img,$Price,$Quantity,$Total,$IDBill){
        $sql="INSERT into cart(IDProd,ProdName,ProdImg,Price,Quantity,Total,IDBill) values ('$IDProd','$Name','$Img','$Price','$Quantity','$Total','$IDBill')";
        pdo_execute($sql);
    }

    function insert_bill($IDUser,$Name,$Address,$Tel,$Email,$Totalbill,$Date,$Method,$Status){
        $sql="insert into bill(IDUser,Name,Address,Tel,Email,Totalbill,Date,Method,Status) values('$IDUser','$Name','$Address','$Tel','$Email','$Totalbill','$Date','$Method','$Status')";
        return pdo_execute_return_lastInsertID($sql);
    }
    
    function get_bill($idbill){
        $sql="select * from bill where ID=".$idbill;
        $bill=pdo_query_one($sql);
        return $bill;
    }
    
    function load_all_cart($idbill){
        $sql="select * from cart where IDBill=".$idbill;
        $listcart=pdo_query($sql);
        return $listcart;
    }
    function count_all_cart($idbill){
        $sql="select * from cart where IDBill=".$idbill;
        $listcart=pdo_query($sql);
        return sizeof($listcart);
    }

    function delete_bill($id){
        $sql= "delete from bill where ID=".$id;
        pdo_execute($sql);
    }


    function load_all_bill($kyw="",$IDUser){
        $sql="select * from bill where 1";
        if ($IDUser>0) $sql.=" AND IDUser=".$IDUser;
        if ($kyw!="") $sql.=" AND ID like '%".$kyw."%'";
        $sql.=" order by ID asc";
        $listbill=pdo_query($sql);
        return $listbill;
    }
    function get_status($n){
        switch ($n){
            case '0':
                $stt="New Order";
                break;
            case '1':
                $stt="Handling";
                break;
            case '2':
                $stt="Shipping";
                break;
            case '3':
                $stt="Done";
                break; 
            default:
                $stt="New Order";
                break;
        }
        return $stt;
    }
    function show_bill($listcart){
        global $Imgpath;
        $totalbill=0;
        $i=1;
        foreach($listcart as $cart){
            extract($cart);
            $hinh=$Imgpath.$cart['ProdImg'];
            $totalbill+=$cart['Total'];
        echo'                     
                       <tr>
                            <td>'.$i.'</td>
                            <td><img src="'.$hinh.'" alt="" height="80px"></td>
                            <td>'.$cart['ProdName'].'</td>
                            <td>'.$cart['Price'].'</td>
                            <td>'.$cart['Quantity'].'</td>
                            <td>'.$cart['Total'].'</td>                               
                        </tr>';
                        $i+=1;
                    }
   }
?>