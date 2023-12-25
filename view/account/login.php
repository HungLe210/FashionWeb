<section id="wrapper">
    <form action="index.php?act=login" method="post" id="form-login" class="section-p1">
    <?php
        if(isset($_SESSION['user'])){
            extract($_SESSION['user']);
    ?>
        <h1 class="form-heading">Account Settings</h1>
            
                <h2 class="form-heading">Hi, <?=$User?></h2>           
           
            <div class="form-func new-func">
                <a href="index.php?act=updtacc"><h3>Update Account</h3></a>
                <a href="index.php?act=fgpw"><h3>Forgot Password? </h3></a>
                <?php 
                    if($Role==1){
                ?>              
                    <a href="admin/index.php"><h3>Log In Admin </h3></a>
                <?php
                    }
                ?>
                <a href="index.php?act=lsbill"><h3>Track My Order</h3></a>
                <a href="index.php?act=logout"><h3>Log Out </h3></a>
            </div>
    <?php
        }else{
    ?>
        
            <h1 class="form-heading">Log In</h1>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-input" name="user" placeholder="Username" required>
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="pass" placeholder="Password" required>
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="form-func">
                <a href="index.php?act=regi"><h4>Register </h4></a>
                <a href="index.php?act=fgpw"><h4>Forgot Password? </h4></a>
            </div>
            <h3><?php
                if(isset($thongbao)&& ($thongbao!="")){
                    echo $thongbao;
                }
                ?>
            </h3>  
            
            <input type="submit" value="Log In" name="login" class="form-submit">            
        
    <?php
        }
    ?>
    </form>
    </section>






    <script src="https://code.jquery.com/jquery-3.6.0.js">   
    </script>
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