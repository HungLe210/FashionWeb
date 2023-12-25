<div class = "r1">
            <div class ="r1 frmtitle">
                <H1>THÊM MỚI SẢN PHẨM</H1>
            </div>
            <div clas ="r1 frmcontent">
                <form action="index.php?act=addprod" method="post" enctype="multipart/form-data">
                    <div class ="r1 mb">
                        Mã sản phẩm<br>
                        <input type="text" name = "masp" disabled>
                    </div>
                    <div class ="r1 mb">
                        Danh mục<br>
                        <select name="idcate">
                            <?php
                                foreach($listcate as $category){
                                    extract($category);                                    
                                    echo'<option value="'.$ID.'">'.$Name.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class ="r1 mb">
                        Tên sản phẩm<br>
                        <input type="text" name ="tensp" required>
                    </div>
                    <div class ="r1 mb">
                        Giá sản phẩm ($)<br>
                        <input type="text" name ="giasp" >
                    </div>
                    <div class ="r1 mb">
                        Hình<br>
                        <input type="file" name ="hinh">
                    </div>
                    
                        Mô tả<br>
                        <textarea name="mota" id="editor1" cols="30" row="10"></textarea>
                    
                    <div class="r1 mb">
                        <input type="submit" name="add" value="Thêm Mới">
                        <a href="index.php?act=lsprod" ><input type="button" value="Danh Sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao) && ($thongbao!="")) echo $thongbao;
                    ?>
                    <script>
                        CKEDITOR.replace('editor1');
                    </script>
                </form>
            </div>
        </div>
        