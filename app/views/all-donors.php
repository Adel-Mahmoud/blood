            <section>
            <div class="section">
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
	        