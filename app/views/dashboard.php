<header>
    <nav class="myNavbar">
        <img class="logo" src="./public/img/logo.jpg">
        <ul class="item-nav">
            <a class="links" href="<?php echo URL_ROOT?>donors/dashboard "><li>لوحة التحكم</li></a>
            <li>[<?php echo $_SESSION["name"];?>]</li>
            <a class="links" href="<?php echo URL_ROOT.'donors/logout'?>"><li>تسجيل الخروج</li></a>
        </ul>
        <div id="btnMenu" class="btn-menu hamburger hamburger--arrowalt-r  ">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </nav>
</header>

<div class="body-home">
    <section>
       <div class="section">
          <div class="container text-center">
       <?php if($data["add"]==true){?>
            <div class="myForm form-sing-up text-center" style="margin-bottom:50px; width:100%;">
            <form method="POST" action="<?php echo URL_ROOT?>donors/dashboard/add " >
            <h3 class="text-center text-primary">
            تسجيل عضو جديد
            </h3>
            <br>
            <div class="form-floating">
            <span class="text-danger pull-right" ><?php
            echo $data['name_err'];
            ?></span>
            <input dir="auto" name="username" required="required" type="text" value="<?php echo $data["username"];?>" class="form-control  " id="username" placeholder=" " >
            <label for="username" class="text-right" style=" right:0px;" >
            إسم المستخدم
            </label>
            </div>
            <br>
            <span class="text-danger pull-right" ><?php echo $data['email_err'];?></span>
            <div class="form-floating">
            <input name="email" required="required" value="<?php echo $data["email"];?>" type="email" class="form-control  " id="email" placeholder=" " >
            <label for="email" class="text-right" style=" right:0px;" >
            ادخل الايميل
            </label>
            </div>
            <br>
            <span id="msg_password_error" class="text-danger pull-right" ><?php echo $data["password_err"];?></span>
            <div class="form-floating password">
            <i class="fa fa-eye" id="showpassword"></i>
            <input name="password" required type="password" class="form-control form-control-sm" id="password" placeholder=" " >
            <label for="password" class="text-right" style=" right:0px;" >
            كلمة المرور
            </label>
            </div>
            <br>
            <div class="form-floating">
            <input name="r_password" required="required" type="password" class="form-control form-control-sm" id="r_password" placeholder=" " >
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
            <div class="input-group mb-3 input-group-lg ">
            <select name="admin" required="required" class="custom-select" id="inputGroupSelect01">
            <option value="" selected>
            إختار
            </option>
            <option value="1">
            ادمن
            </option>
            <option value="0">
            عضو
            </option>
            </select>
            <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect01">
            الصلاحيه
            </label>
            </div>
            </div>
            <div class="text-center">
            <button class="btn-login text-light"  typy="submit">
            إضافه
            </button>
            </div>
            </form>
            </div>
       <?php }
        
        if($data["edit"]==true){?>
            <div class="myForm form-sing-up" style="margin-bottom:50px; width:100%;">
            <form method="POST" action="<?php echo URL_ROOT.'donors/dashboard/edit'?>" >
            <h3 class="text-center text-success">
            تعديل بيانات العضو
            <?php echo $data["users"]->username;?>
            </h3>
            <br>
            <div class="form-floating">
            <input type="hidden" name="id" value="<?php echo $data['users']->id;?>">
            <span class="text-danger pull-right" ><?php
            echo $data['name_err'];
            ?></span>
            <input value="<?php echo $data['users']->username;?>" dir="auto" name="username" required="required" type="text" value="<?php echo $data["username"];?>" class="form-control" id="username" placeholder=" " >
            <label for="username" class="text-right" style=" right:0px;" >
            إسم المستخدم
            </label>
            </div>
            <br>
            <span class="text-danger pull-right" ><?php echo $data['email_err'];?></span>
            <div class="form-floating">
            <input value="<?php echo $data['users']->email;?>" name="email" required="required" value="<?php echo $data["email"];?>" type="email" class="form-control  " id="email" placeholder=" " >
            <label for="email" class="text-right" style=" right:0px;" >
            ادخل الايميل
            </label>
            </div>
            <br>
            <span id="msg_password_error" class="text-danger pull-right" ><?php echo $data["password_err"];?></span>
            <div class="form-floating password">
            <i class="fa fa-eye" id="showpassword"></i>
            <input value="<?php echo $data['users']->password;?>" name="password" required type="password" class="form-control form-control-sm" id="password" placeholder=" " >
            <label for="password" class="text-right" style=" right:0px;" >
            كلمة المرور
            </label>
            </div>
            <br>
            <div class="form-floating">
            <input value="<?php echo $data['users']->password;?>" name="r_password" required="required" type="password" class="form-control form-control-sm" id="r_password" placeholder=" " >
            <label for="r_password" class="text-right" style=" right:0px;" >
            تأكيد كلمة المرور
            </label>
            </div>
            <br>
            <div class="input-group mb-3 input-group-lg ">
            <select name="gander" required="required" class="custom-select" id="inputGroupSelect01">
            <option value="" >
            إختار
            </option>
            <option value="ذكر" <?php if($data['users']->gander=="ذكر"){echo 'selected';} ?> >
            ذكر
            </option>
            <option value="انثي" <?php if($data['users']->gander=="انثي"){echo 'selected';} ?> >
            انثي
            </option>
            </select>
            <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect01">
            النوع
            </label>
            </div>
            </div>
            <div class="input-group mb-3 input-group-lg ">
            <select name="admin" required="required" class="custom-select" id="inputGroupSelect01">
            <option value="" selected>
            إختار
            </option>
            <option value="1" <?php if($data['users']->admin > 0){echo 'selected';} ?>>
            ادمن
            </option>
            <option value="0" <?php if($data['users']->admin == 0){echo 'selected';} ?>>
            عضو
            </option>
            </select>
            <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect01">
            الصلاحيه
            </label>
            </div>
            </div>
            <div class="text-center">
            <button class="btn-sing-up text-light"  typy="submit">
            تعديل
            </button>
            </div>
            </form>
            </div>
       <?php }?>
       
       
       
    <div class="table table-responsive bd-example container" style="padding:2%;<?php if($data["add"]||$data["edit"]){echo 'display:none;';}?>">
    <div>
        <input id="myInput" onkeyup="myFunction()" class="form-control pull-right" type="search" style="width:150px;" placeholder="... البحث">
        <a href="<?php echo URL_ROOT.'donors/dashboard/add';?>" class="btn btn-primary pull-left"><i class="fa fa-user"></i>+  إضافة</a>
    </div>
    <br><br>
    <table class="table text-right bg-light rounded ">
    <thead class="thead-dark">
    <tr>
    <th scope="col">فصيلة الدم</th>
    <th scope="col">المدينة</th>
    <th scope="col">رقم الهاتف</th>
    <th scope="col">الصلاحية</th>
    <th scope="col">الدولة</th>
    <th scope="col">النوع</th>
    <th scope="col">الايميل</th>
    <th scope="col">الاسم</th>
    <th scope="col">رقم</th>
    <th scope="col">الحزف</th>
    <th scope="col">التعديل</th>
    </tr>
    </thead>
    <tbody id="myTable">
    <?php foreach($data["users"] as $doner){?>
    <tr>
    <td><?php if($doner->blood_type){echo $doner->blood_type ;}else{echo 'Null';} ?></td>
    <td><?php if($doner->city){echo $doner->city ;}else{echo 'Null';}?></td>
    <td><?php if($doner->phone){echo $doner->phone ;}else{echo 'Null';}?></td>
    <td><?php if($doner->admin>0){echo 'أدمن';}else{echo 'عضو';};?></td>
    <td >مصر</td>
    <td><?php echo $doner->gander;?></td>
    <td><?php echo $doner->email;?></td>
    <td><?php echo $doner->username;?></td>
    <td> <?php echo $doner->id;?></td>
    <td>
        <a class="btn btn-danger btn-xs" href="<?php echo URL_ROOT.'donors/dashboard/delete/'. $doner->id;?>">حزف</a>
    </td><td>    
        <a class="btn btn-success btn-xs" href="<?php echo URL_ROOT.'donors/dashboard/edit/'. $doner->id;?>">تعديل</a>
    </td>
    </tr>     
    <?php }?>
    </tbody>
    </table>    
    </div>
    </div>
</div>
</section>
<?php
  require_once ('./app/views/layout/footer_tmp.php');
?>



