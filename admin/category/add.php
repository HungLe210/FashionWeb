<div class = "r1">
            <div class ="r1 frmtitle">
                <H1>THÊM MỚI DANH MỤC</H1>
            </div>
            <div clas ="r1 frmcontent">
                <form action="index.php?act=addcate" method="post">
                    <div class ="r1 mb">
                        Mã loại<br>
                        <input type="text" name = "maloai" disabled>
                    </div>
                    <div class ="r1 mb">
                        Tên loại<br>
                        <input type="text" name ="tenloai">
                    </div>
                    <div class="r1 mb">
                        <input type="submit" name="add" value="Thêm Mới">
                        <input type="reset" value="Nhập Lại">
                        <a href="index.php?act=lscate" ><input type="button" value="Danh Sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao) && ($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>