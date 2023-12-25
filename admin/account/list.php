<div class = "r1">
            <div class ="r1 frmtitle">
                <H1>DANH SÁCH TÀI KHOẢN</H1>
            </div>                 
        </div>
        <div class="r1 frmcontent">
            <div class ="r1 mb frmdsloai">
                <table>
                    <tr>
                        <th>MÃ TÀI KHOẢN</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>EMAIL</th>
                        <th>ADDRESS</th>
                        <th>TEL</th>
                        <th>ROLE<th>
                    </tr>
                    <?php
                        foreach ($listacc as $account)
                        {
                            extract($account);
                            $editacc="index.php?act=edacc&id=".$ID;
                            $delacc="index.php?act=delacc&id=".$ID;
                            if ($Role==1)   $rs="Admin";
                                        else $rs="Client";
                            echo 
                                '<tr>
                                    <td>'.$ID.'</td>
                                    <td>'.$User.'</td>
                                    <td>'.$Pass.'</td>
                                    <td>'.$Email.'</td>

                                    <td>'.$Address.'</td>
                                    <td>'.$Tel.'</td>
                                    
                                    <td>'.$rs.'</td>
                                    <td><a href="'.$editacc.'"><input type="button" value="Sửa"></a> <a href="'.$delacc.'"><input type="button" value="Xóa"></a></td>
                                </tr>';
                        }
                    ?>
                    
                </table>
               
            </div>
            <div class ="r1 mb">
                
            </div>
            <div class="r1 mb">
                <a href="index.php?act=addcate" ><input type="button" value="Nhập Thêm"></a>
            </div>
        </div>