<?php
    if(is_array($prod)) {
        extract($prod);
    }
    $imgpath="../upload/".$Img;
    if(is_file($imgpath)){
        $hinh="<img src='".$imgpath."' height ='80'>";
    }else{
        $hinh= "no photo";
    }                                                
?>

<div class = "r1">
            <div class ="r1 frmtitle">
                <H1>CẬP NHẬT DANH MỤC</H1>
            </div>
            <div clas ="r1 frmcontent">
                <form action="index.php?act=updtprod" method="post" enctype="multipart/form-data">
                    <div class ="r1 mb">
                        <select name="idcate">
                            <option value="0" selected> Tất cả </option>
                            <?php
                                foreach($listcate as $category){
                                    extract($category);
                                    if($IDCate==$ID) $s="selected"; 
                                        else $s= "";
                                    echo'<option value="'.$ID.'" '.$s.'>'.$Name.'</option>';
                                }
                            ?>
                        </select>
                       
                    </div>
                    <div class ="r1 mb">
                        Tên sản phẩm<br>
                        <input type="text" name ="tensp" value="<?=$prod['Name']?>">
                    </div>
                    <div class ="r1 mb">
                        Giá sản phẩm<br>
                        <input type="text" name ="giasp" value="<?=$Price?>">
                    </div>
                    <div class ="r1 mb">
                        Hình<br>
                        <input type="file" name ="hinh">
                        <?=$hinh?>
                    </div>
                    <div class ="r1 mb">
                        Mô tả<br>
                        <textarea name="mota" id="" cols="30" row="10"><?=$Descrp?></textarea>
                    </div>
                    
                    <div class="r1 mb">
                        <input type="hidden" name="id" value="<?=$prod['ID']?>">
                        <input type="submit" name="updt" value="Cập Nhật">
                        <input type="reset" value="Nhập Lại">
                        <a href="index.php?act=lsprod" ><input type="button" value="Danh Sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao) && ($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>