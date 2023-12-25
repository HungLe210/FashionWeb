<div class = "r1">
            <div class ="r1 frmtitle">
                <H1>DANH SÁCH ĐƠN HÀNG</H1>
            </div>                 
        </div>
        <div class="r1 frmcontent">
            <div class ="r1 mb frmdsloai">
            <form action="index.php?act=listbill" method="post">
                <input type="text" name="kyw">
                <select name="id">
                    <option value="0" selected> Tất cả </option>
                    <?php
                                foreach($listbill as $bill){
                                    extract($bill);
                                    
                                    echo'<option value="'.$bill['ID'].'">'.$bill['ID'].'</option>';
                                }
                            ?>
                </select>
                <input type="submit" name="listok" value="GO">

            </form>
        
                <table>
                    <tr>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>KHÁCH HÀNG</th>                        
                        <th>SỐ LƯỢNG HÀNG</th>
                        <th>GIÁ TRỊ ĐƠN HÀNG</th>
                        <th>NGÀY ĐẶT HÀNG</th>
                        <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                        <th></th>
                    </tr>
                    <?php
                        foreach ($listbill as $bill)
                        {
                            extract($bill);
                            $delbill="index.php?act=delbill&id=".$ID;
                            $count=count_all_cart($bill['ID']);
                            $stt=get_status($bill['ID']);
                            
                            echo 
                                '<tr>
                                    <td>BID-'.$bill['ID'].'</td>
                                    <td>'.$bill['Name'].'
                                    <br>'.$bill['Address'].'
                                    <br>'.$bill['Email'].'
                                    <br>'.$bill['Tel'].'</td>
                                    <td>'.$count.'</td>
                                    <td>'.$bill['Totalbill'].'$</td>
                                    <td>'.$bill['Date'].'</td>
                                    <td>'.$stt.'
                                    </td>
                                    
                                    
                                    <td><a href="'.$delbill.'"><input type="button" value="Xóa"></a></td>
                                </tr>';
                        }
                    ?>
                    
                </table>
               
                    </div>
        </div>