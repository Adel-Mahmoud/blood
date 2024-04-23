            	        <div class="body-home">        
            	        <img class="slider" src="./public/img/1.png" style="top:0;">
	        <section>
	        <div class="section">
	        <div class="myForm text-center">
	        <form method="POST" action="<?php echo URL_ROOT?>donors/code">
	        
	        <h3 class="text-center text-success">
	     صفحة كود التحقق
	        </h3>
	        <br>
	        <div class="form-group m-b">
	        <span class="text-right text-danger"><?php echo $data["code_err"];?></span>
	        <input type="number" name="code" required class="form-control" id="" placeholder="
	        ادخل كود التحقق
	        " >
	        </div>
	        <button class="btn btn-success text-light"  typy="submit">
	        ارسال
	        </button>
	        </form>
	        <a href="<?php echo URL_ROOT?>donors/login" class="pull-left">
	        تسجيل الدخول
	        </a>
	        </div>
	        <br>
	        </div>
	        </section>
	        </div>