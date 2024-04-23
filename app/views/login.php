            <div class="body-home">        
            <img class="slider" src="./public/img/1.png" style="top:0;">
            <section>
            <div class="section">
            <div class="myForm form-sing-up" style="margin-bottom:50px;">
            <form method="POST" action="<?php echo URL_ROOT?>donors/login" >
            <h3 class="text-center text-primary">
            تسجيل الدخول
            </h3>
            <span class="text-danger pull-right" ><?php /*echo $data['email_err'];*/?></span>
            <br>
            <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" value="<?php /*echo $data['email'];*/?>" required placeholder=" ">
            <label for="email" class="text-right" style=" right:0px;" >
            ادخل الايميل
            </label>
            </div>
            <span class="text-danger pull-right" ><?php /*echo $data['pass_err'];*/?></span>
            <br>
            <div class="form-floating password">
            <i class="fa fa-eye" id="showpassword"></i>
            <input type="password" class="form-control" name="password" id="password" required placeholder=" ">
            <label for="password" class="text-right" style=" right:0px;" >
            ادخل كلمة المرور
            </label>
            </div>
            <br>
            <div class="text-center">
            <button class="btn-login text-light"  typy="submit">
            التسجيل
            </button>
            </div>
            </form>
            <br>
            <a href="<?php echo URL_ROOT?>donors/register" class="pull-right">
             عضو جديد
            </a>
            <a href="<?php echo URL_ROOT?>donors/email" class="pull-left">
            نسيت كلمة المرور؟
            </a>
            </div>   
            </div> 
            </section>
            </div>
            