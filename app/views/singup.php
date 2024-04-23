         <div class="body-home">        
            <img class="slider" src="./public/img/1.png" style="top:0;">
            <section>
            <div class="section">
            <div class="myForm form-sing-up" style="margin-bottom:50px;">
            <form method="POST" action="<?php echo URL_ROOT?>donors/register" >
            <h3 class="text-center text-success">
            تسجيل عضو جديد
            </h3>
            <br>
            <div class="form-floating">
            <span class="text-danger pull-right" ><?php
            //  echo $data['name_err'];
            ?></span>
            <input dir="auto" name="username" required="required" type="text" value="<?php echo $data["username"];?>" class="form-control form-control-sm" id="username" placeholder=" " >
            <label for="username" class="text-right" style=" right:0px;" >
            إسم المستخدم
            </label>
            </div>
            <br>
            <span class="text-danger pull-right" ><?php
            //  echo $data['email_err'];
             ?></span>
            <div class="form-floating">
            <input name="email" required="required" value="<?php echo $data["email"];?>" type="email" class="form-control form-control-sm" id="email" placeholder=" " >
            <label for="email" class="text-right" style=" right:0px;" >
            ادخل الايميل
            </label>
            </div>
            <br>
            <span id="msg_password_error" class="text-danger pull-right" ><?php echo $data["password_err"];?></span>
            <div class="form-floating password">
            <i class="fa fa-eye" id="showpassword"></i>
            <input value="<?php echo $data["password"];?>" name="password" required type="password" class="form-control form-control-sm" id="password" placeholder=" " >
            <label for="password" class="text-right" style=" right:0px;" >
            كلمة المرور
            </label>
            </div>
            <br>
            <div class="form-floating">
            <input value="<?php echo $data["password"];?>" name="r_password" required="required" type="password" class="form-control form-control-sm" id="r_password" placeholder=" " >
            <label for="r_password" class="text-right" style=" right:0px;" >
            تأكيد كلمة المرور
            </label>
            </div>
            <br>
            <div class="input-group mb-3 input-group-lg ">
            <select name="gander" required="required" class="custom-select" id="inputGroupSelect01">
            <option value="" selected>
           إختار
            </option>
            <option value="ذكر">
            ذكر
            </option>
            <option value="انثي">
            انثي
            </option>
            </select>
            <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect01">
            النوع
            </label>
            </div>
            </div>
            <div class="text-center">
            <button class="btn-sing-up text-light"  typy="submit">
            التسجيل
            </button>
            </div>
            </form>
            <br>
            <a href="<?php echo URL_ROOT?>donors/login" class="pull-left">
             تسجيل الدخول
            </a>
            </div>   
            </div> 
            </section>
            </div>
            