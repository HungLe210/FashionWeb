<section id="wrapper">
        <form action="index.php?act=regi" method="post" id="form-login" class="section-p1">
            <h1 class="form-heading">Register</h1>
            
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-input" name="user" placeholder="Username">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="pass" placeholder="Password">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>       
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="email" class="form-input" name="email" placeholder="Email">
            </div>
           
            <div class="form-func">
                <a href="index.php?act=login"><h4>Log In</h4></a>
                <a href="index.php?act=fgpw"><h4>Forgot Password? </h4></a>
            </div>   
            <input type="submit" value="Register" name="regi" class="form-submit"> 
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