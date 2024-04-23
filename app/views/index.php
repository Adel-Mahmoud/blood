          <div class="body-home">
          <img class="slider" src="./public/img/1.png">
          <section>
                <div class="section" style="display:block text-center">
                
                <!---->
                <div class="text-center" style="overflow:scroll; width:100%;">
                <div class="myForm <?php if(isset($data["hide"])){echo "d-none";}?>" style="margin:0 auto;">
                   <form class="form-search" method="POST" action="<?php echo URL_ROOT?>donors/index">   
                      <h3 class="text-center text-primary">
	                    البحث عن المتبرعين
	                    </h3>
	                    <hr>
	                    <div>
		                    <div class="input-group mb-3  input-group-lg select-group">
		                    <select required  name="city" class="custom-select" aria-label="Default select example">
		                    	<option value="" selected>
		                    			                    إختار 👇
		                    	</option>		                        
		                    	<?php
		                    	 foreach($data["search1"] as $search){
		                    	   if(!empty($search->city)){
		                    	      echo '<option value="'.$search->city.'">'.$search->city.'</option>';
		                    	   }
		                    	 }
		                    	?>
		                    </select>
		                    <div class="input-group-append">
		                    <label class="input-group-text" for="city">
		                    إختار المدينة
		                    </label>
		                    </div>
		                    </div>
	                    </div>
	                    <hr>
	                    <div>
		                    <div class="input-group mb-3  input-group-lg select-group">
		                    <select required id="bloodType" name="blood_type" class="custom-select" aria-label="Default select example">
		                    	<option value="" selected>
		                    			                    			   إختار 👇
		                        </option>    
		                        <?php
		                           foreach($data["search2"] as $search){
		                              if(!empty($search->blood_type)){
		                                 echo '<option value="'.$search->blood_type.'">'.$search->blood_type.'</option>';
		                              }
		                           }
		                        ?>
		                    </select>
		                    <div class="input-group-append">
		                    <label class="input-group-text" for="bloodType">
		                    إختار فصيلة الدم
		                    </label>
		                    </div>
		                    </div>
	                    </div>
	                    <hr>
	                    <div style="height:50px;">
	                    <button class="btn-search" type="submit"></button>
	                    <a href="<?php echo URL_ROOT?>donors/addDonor" class="add-user"></a>
	                    </div>
	                 </form>
	               </div>
	               <br>
	              
	              <!-- Get Data -->
	              <div class="container">
	              <div style="display:none;" class="table table-responsive bd-example container <?php if(isset($data["show"])){echo "d-block";}?>" style="padding:2%;">
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
	              <?php foreach($data["donors"] as $doner){?>
	              <tr>
	              <td><?php echo $doner->blood_type;?></td>
	              <td><?php echo $doner->city;?></td>
	              <td>مصر</td>
	              <td><?php echo $doner->phone;?></td>
	              <td><?php echo $doner->gander;?></td>
	              <td><?php echo $doner->username;?></td>
	              <th scope="row"> <?php echo $doner->id;?> </th>
	              </tr>     
	              <?php }
	              if(empty($data["donors"])){  
	                  echo '<td colspan="7" class="text-center">الاعضاء سكان هذه المحافظة ليس لديهم هذه الفصيلة</td>';
	              }
	              ?>
	              </tbody>
	              </table>    
	              </div>
	              </div>  
	              </div>
	              </div>
	       </section>
	       </div>
	       