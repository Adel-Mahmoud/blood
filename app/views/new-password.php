            <div class="body-home">        
            <img class="slider" src="./public/img/1.png" style="top:0;">
	        <section>
	        <div class="section">
	        <div class="myForm form-sing-up">
	        <form method="POST" action="<?php echo URL_ROOT?>donors/newpassword">
	        
	        <h3 class="text-center text-primary">
	        كلمة المرور الجديده
	        </h3>
	        <br>
	        <div class="form-group m-b">
	        <span class="pull-right text-danger"><?php echo $data["np_err"];?></span>
	        <input name="password" type="password" class="form-control" id="password" placeholder="
	        ادخل كلمة المرور الجديده
	        " >
	        </div>
	        <span id="msg_password_error" class="pull-right text-danger"></span>
	        <div class="form-group m-b">
	        <input  type="password" class="form-control" id="r_password" placeholder="
	        ادخل كلمة المرور الجديده
	        " >
	        </div>
	        <div class="text-center">
	        <button class="btn btn-primary text-light"  typy="button">
	        حفظ
	        </button>
	        </div>
	        </form>
	        </div>
	        </div>
	        </section>
	        </div>