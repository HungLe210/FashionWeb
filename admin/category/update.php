<?php
    if(is_array($cate)) {
        extract($cate);
    }
?>

<div class = "r1">
            <div class ="r1 frmtitle">
                <H1>CẬP NHẬT DANH MỤC</H1>
            </div>
            <div clas ="r1 frmcontent">
                <form action="index.php?act=updtcate" method="post">
                    <div class ="r1 mb">
                        Mã loại<br>
                        <input type="text" name = "maloai" disabled>
                    </div>
                    <div class ="r1 mb">
                        Tên loại<br>
                        <input type="text" name ="tenloai" value="<?=$Name?>">
                    </div>
                    <div class="r1 mb">
                        <input type ="hidden" name="id" value="<?= $ID?> ">
                        <input type="submit" name="updt" value="CẬP NHẬT">
                        <a href="index.php?act=lscate" ><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php
                        if(isset($thongbao) && ($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>