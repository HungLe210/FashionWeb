<section id="wrapper">
        <form action="index.php?act=updtacc" method="post" id="form-login" class="section-p1">
        <?php
            if(isset($_SESSION['user']) && (is_array($_SESSION['user']))){
                extract($_SESSION['user']);
            }
        ?>
            <h1 class="form-heading">Update</h1>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-input" name="user" value="<?=$User?>">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="pass" value="<?=$Pass?>">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>       
            <div class="form-group">
                <i class="fas fa-at"></i>
                <input type="email" class="form-input" name="email" value="<?=$Email?>">
            </div>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-input" name="address" value="<?=$Address?>" placeholder="Address">
            </div>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-input" name="tel" value="<?=$Tel?>" placeholder="Tel">
            </div>
            
            <input type="hidden" name="id" value="<?=$ID?>">
            <input type="submit" value="Confirm" name="updt" class="form-submit">
            
            <h2><?php
                if(isset($thongbao)&& ($thongbao!="")){
                    echo $thongbao;
                }            
            ?>
    </h2>   
        </form>
    


</section>




<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script>    
        $(document).ready(function(){
            $('#eye').click(function(){
                $(this).toggleClass('open');
                $(this).children('i').toggleClass('fa-eye-slash fa-eye');
                if($(this).hasClass('open')){
                    $(this).prev().attr('type','text');
                }else
                    $(this).prev().attr('type','password');
            })
        });
    </script>