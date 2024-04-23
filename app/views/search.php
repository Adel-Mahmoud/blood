                 
                 <section>
                 <div class="section" style="display:block text-center">
                 
                 <!---->
                 <div class="text-center" style="overflow:scroll; height:300px; margin-bottom:200px;">
                 <div class="myForm" style="margin:0 auto;">
                    <form class="form-search" method="POST" action="<?php echo URL_ROOT?>donors/index">   
                       <h3 class="text-center text-primary">
	                    البحث عن المتبرعين
	                    </h3>
	                    <hr>
	                    <div>
		                    <label for="country" class="pull-right">: 
		                    إختار الدولة
		                    </label>
		                    <select required id="country" name="country" class="form-control float: left;" aria-label="Default select example">
			                    <option value=" " selected>
			                    إضغط هنا
			                    </option> 
			                      <option value="الأردن">الأردن</option>
			                      <option value="الإمارت">الإمارات</option>
			                      <option value="البحرين">البحرين</option>
			                      <option value="الجزائر">الجزائر</option>
			                      <option value="السعودية">السعودية</option>
			                      <option value="السودان">السودان</option>
			                      <option value="الصومال">الصومال</option>
			                      <option value="العراق">العراق</option>
			                      <option value="الكويت">الكويت</option>
			                      <option value="المغرب">المغرب</option>
			                      <option value="اليمن">اليمن</option>
			                      <option value="تركيا">تركيا</option>
			                      <option value="تونس">تونس</option>
			                      <option value="جزر القمر">جزر القمر</option>
			                      <option value="جنوب السودان">جنوب السودان</option>
			                      <option value="جيبوتي">جيبوتي</option>
			                      <option value="سوريا">سوريا</option>
			                      <option value="عمان">عمان</option>
			                      <option value="فلسطين">فلسطين</option>
			                      <option value="قطر">قطر</option>
			                      <option value="لبنان">لبنان</option>
			                      <option value="ليبيا">ليبيا</option>
			                      <option value="مصر">مصر</option>
			                      <option value="موريتانيا">موريتانيا</option>
		                    </select>
	                    </div>
	                    <hr>
	                    <div>
		                    <label for="city" class="pull-right">: 
		                    إختار المدينة
		                    </label>
		                    <select required id="city" name="city" class="form-control float: left;" aria-label="Default select example">
		                    	<option value="" selected>
		                    			                    إضغط هنا
		                    	</option>
		                    	<option value="اسوان">اسوان</option>
		                    	<option value="اسيوط">اسيوط</option>
		                    	<option value="الأقصر">الأقصر</option>
		                    	<option value="الإسكندرية">الإسكندرية</option>
		                    	<option value="الإسماعيلية">الإسماعيلية</option>
		                    	<option value="البحيره">البحيره</option>
		                    	<option value="الجيزه">الجيزه</option>
		                    	<option value="الحسنيه">الحسنيه</option>
		                    	<option value="الخارجة">الخارجة</option>
		                    	<option value="الداخلة">الداخلة</option>
		                    	<option value="الدقهلية">الدقهلية</option>
		                    	<option value="الزقازيق">الزقازيق</option>
		                    	<option value="السلوم">السلوم</option>
		                    	<option value="السويس">السويس</option>
		                    	<option value="الشرقية">الشرقية</option>
		                    	<option value="الطور">الطور</option>
		                    	<option value="العريش">العريش</option>
		                    	<option value="الغربية">الغربية</option>
		                    	<option value="الغردقه">الغردقه</option>
		                    	<option value="الفرافرة">الفرافرة</option>
		                    	<option value="الفيوم">الفيوم</option>
		                    	<option value="القاهره">القاهره</option>
		                    	<option value="القليوبية">القليوبية</option>
		                    	<option value="المحلة الكبرى">المحلة الكبرى</option>
		                    	<option value="المنصورة">المنصورة</option>
		                    	<option value="المنوفية">المنوفية</option>
		                    	<option value="المنيا">المنيا</option>
		                    	<option value="الوادي الجديد">الوادي الجديد</option>
		                    	<option value="بنى سويف">بنى سويف</option>
		                    	<option value="بورسعيد">بورسعيد</option>
		                    	<option value="حلوان">حلوان</option>
		                    	<option value="دمياط">دمياط</option>
		                    	<option value="ديرب نجم">ديرب نجم</option>
		                    	<option value="رأس البر">رأس البر</option>
		                    	<option value="رفح">رفح</option>
		                    	<option value="سوهاج">سوهاج</option>
		                    	<option value="شرم الشيخ">شرم الشيخ</option>
		                    	<option value="صان الحجر">صان الحجر</option>
		                    	<option value="صفط زريق">صفط زريق</option>
		                    	<option value="طنطا">طنطا</option>
		                    	<option value="فاقوس">فاقوس</option>
		                    	<option value="قنا">قنا</option>
		                    	<option value="كفر الشيخ">كفر الشيخ</option>
		                    	<option value="كفر صقر">كفر صقر</option>
		                    	<option value="منيا القمح">منيا القمح</</option>
		                    </select>
	                    </div>
	                    <hr>
	                    <div>
		                    <label for="bloodTyby" class="pull-right">
		                    إختار فصيلة الدم
		                    </label>
		                    <select required id="bloodTyby" name="blood_type" class="form-control float: left;" aria-label="Default select example">
		                    	<option value="" selected>
		                    			                    إضغط هنا
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
	                    </div>
	                    <hr>
	                    <button class="btn-search" type="submit"></button>
	                    <div class="add-user"></div>
	                 </form>
	               </div>
	               
	               
	               
	               
	               <div class="bd-example" style="padding:2%;">
	               <table class="table text-right bg-light rounded ">
	               <thead class="thead-dark">
	               <tr>
	               <th scope="col">فصيلة الدم</th>
	               <th scope="col">المدينة</th>
	               <th scope="col">الدولة</th>
	               <th scope="col">رقم الهاتف</th>
	               <th scope="col">النوع</th>
	               <th scope="col">إسم المتبرع</th>
	               <th scope="col">رقم</th>
	               </tr>
	               </thead>
	               <tbody>
	               <?php foreach($data as $doner){?>
	               <tr>
	               <td><?php echo $doner->blood_type;?></td>
	               <td><?php echo $doner->city;?></td>
	               <td><?php echo $doner->country;?></td>
	               <td><?php echo $doner->phone;?></td>
	               <td><?php echo $doner->gander;?></td>
	               <td><?php echo $doner->username;?></td>
	               <th scope="row"> <?php echo $doner->id;?> </th>
	               </tr>     
	               <?php }?>
	               </tbody>
	               </table>  
	               
	               
	               </div>
	               </div>
	               </section>