<div class = "r1">
            <div class ="r1 frmtitle">
                <H1>DANH SÁCH SẢN PHẨM</H1>
            </div>                 
        </div>
        <div class="r1 frmcontent">
            <div class ="r1 mb frmdsloai">
            <form action="index.php?act=lsprod" method="post">
                <input type="text" name="kyw">
                <select name="idcate">
                    <option value="0" selected> Tất cả </option>
                    <?php
                                foreach($listcate as $category){
                                    extract($category);
                                    
                                    echo'<option value="'.$ID.'">'.$Name.'</option>';
                                }
                            ?>
                </select>
                <input type="submit" name="listok" value="GO">

            </form>
        
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN SẢN PHẨM</th>                        
                        <th>HÌNH</th>
                        <th>GIÁ</th>
                        <th></th>
                    </tr>
                    <?php
                        foreach ($listprod as $product)
                        {
                            extract($product);
                            $editprod="index.php?act=edprod&id=".$ID;
                            $delprod="index.php?act=delprod&id=".$ID;
                            $imgpath="../upload/".$Img;
                            if(is_file($imgpath)){
                                $hinh="<img src='".$imgpath."' height ='80'>";
                            }
                            else{
                                $hinh= "no photo";
                            }
                            echo 
                                '<tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>'.$ID.'</td>
                                    <td>'.$Name.'</td>
                                    <td>'.$hinh.'</td>
                                    <td>'.$Price.'</td>
                                    <td><a href="'.$editprod.'"><input type="button" value="Sửa"></a> <a href="'.$delprod.'"><input type="button" value="Xóa"></a></td>
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
                <a href="index.php?act=addprod" ><input type="button" value="Nhập Thêm"></a>
            </div>
        </div>