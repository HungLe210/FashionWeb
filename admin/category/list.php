<div class = "r1">
            <div class ="r1 frmtitle">
                <H1>DANH SÁCH DANH MỤC</H1>
            </div>                 
        </div>
        <div class="r1 frmcontent">
            <div class ="r1 mb frmdsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th></th>
                    </tr>
                    <?php
                        foreach ($listcate as $category)
                        {
                            extract($category);
                            $editcate="index.php?act=edcate&id=".$ID;
                            $delcate="index.php?act=dlcate&id=".$ID;
                            echo 
                                '<tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>'.$ID.'</td>
                                    <td>'.$Name.'</td>
                                    <td><a href="'.$editcate.'"><input type="button" value="Sửa"></a> <a href="'.$delcate.'"><input type="button" value="Xóa"></a></td>
                                </tr>';
                        }
                    ?>
                    
                </table>
               
            </div>
            <div class ="r1 mb">
                
            </div>
            <div class="r1 mb">
                <input type="button" value="Chọn tất cả">
                <input type="button" value="Bỏ chọn tất cả">
                <input type="button" value="Xoá các mục đã chọn">
                <a href="index.php?act=addcate" ><input type="button" value="NHẬP THÊM"></a>
            </div>
        </div>