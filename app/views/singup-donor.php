<div class="body-home">        
   <img class="slider" src="./public/img/1.png" style="top:60px;">
   <section>
   <div class="section">
   <div class="myForm form-sing-up" style="margin-bottom:50px;">
   <form method="POST" action="<?php echo URL_ROOT?>donors/addDonor" >
   <h3 class="text-center text-success">
   تسجيل متبرع جديد
   </h3>
   <br>
   <div class="form-floating">
   <input type="number" id="phone" class="form-control" name="phone" required placeholder=" ">
   <label for="phone" class="text-right" style=" right:0px;" >
   ادخل رقم الهاتف
   </label>
   </div>
   <br>
   
   <div class="input-group mb-3  input-group-lg select-group">
   <select name="blood_type" required="required" class="custom-select" id="inputGroupSelect04">
   <option value="" selected>
   إختار
   </option>
   <option value="+O">+O</option>
   <option value="-O">-O</option>
   <option value="+B">+B</option>
   <option value="-B">-B</option>
   <option value="+A">+A</option>
   <option value="-A">-A</option>
   <option value="+AB">+AB</option>
   <option value="-AB">-AB</option>
   </select>
   <div class="input-group-append">
   <label class="input-group-text" for="inputGroupSelect04">
   فصيلة الدم
   </label>
   </div>
   </div>
   
   <div class="input-group mb-3 input-group-lg">
   <select name="city" required="required" class="custom-select" id="city">
   <option value="" selected>
   إختار
   </option>
   
   </select>
   <div class="input-group-append">
   <label class="input-group-text" for="city">
   المدينة
   </label>
   </div>
   </div>
   
   <div class="text-center">
   <button class="btn-sing-up text-light"  typy="submit">
   التسجيل
   </button>
   </div>
   </form>
   </div>   
   </div> 
   </section>
   </div>
   <script>
      const allCityText = 'القاهرة.الجيزة.الأسكندرية.الدقهلية.الشرقية.المنوفية.القليوبية.البحيرة.الغربية.بور سعيد.دمياط.الإسماعلية.السويس.كفر الشيخ.الفيوم.بني سويف.مطروح.شمال سيناء.جنوب سيناء.المنيا.أسيوط.سوهاج.قنا.البحرالاحمر .الأقصر.أسوان.الواحات.الوادي الجديد';
      const allCityArray = allCityText.split(".");
      allCityArray.map(function(city){
         document.getElementById("city").innerHTML+=`<option value="${city}">${city}</option`;
      });
   </script>
   