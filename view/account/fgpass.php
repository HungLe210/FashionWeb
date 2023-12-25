<section id="wrapper">
        <form action="index.php?act=fgpw" method="post" id="form-login" class="section-p1">
            <h1 class="form-heading">Forgot Password?</h1>
            <h2>Type your email used for creating account</h2>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-input" name="user" placeholder="Username">
            </div> 
            <div class="form-group">
                <i class="fas fa-at"></i>
                <input type="text" class="form-input" name="email" placeholder="Email">
            </div>          
            <div class="form-func">
                <a href="index.php?act=login"><h4>Log In</h4></a>
                <a href="index.php?act=regi"><h4>Register</h4></a>
            </div> 
            
            <input type="submit" value="Send" name="send" class="form-submit"> 
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