           <div class="body-home">        
           <img class="slider" src="./public/img/1.png" style="top:0;">
           <section>
	        <div class="section">
	        <div class="myForm text-center">
	        <form method="POST" action="<?php echo URL_ROOT.'donors/email';?>">
	        <h3 class="text-center text-primary">
	        استعادة كلمة المرور
	        </h3>
	        <br>
	        <div class="form-group m-b">
	        <span class="text-right text-danger"><?php echo $data["email_err"]?></span>
	        <input type="email" name="email" required class="form-control" id="" placeholder="
	        ادخل بريدك الالكتروني
	        " >
	        </div>
	        <button class="btn btn-primary text-light"  typy="submit">
	        ارسال
	        </button>
	        <br>
	        </form>
	        </div>
	        <br>
	        </div>
	        </section>
	        </div>