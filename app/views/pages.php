<br><hr>
<div class="body-home">
<img class="slider" src="./public/img/1.png">
<div class="section">
	<div class="container">	
		<div class="card">
			<img src="<?php echo $data["img"];?>" class="">
			<div class="card-body">
				<p class="card-text text-right">
				    <?php echo $data["content"];?>
				</p>			
        	</div>
        	<?php if($data["contact_us"]){?>
        	<hr>
        	<div class="container">
        	<div class="form-floating">
        	<textarea type="text" class="form-control" id="msg" placeholder="Test" style="height:100px;"></textarea>
        	<label for="msg" class="text-right" style=" right:0px;" >
....         	اكتب رسالتك هنا
        	</label>
        	</div>
        	<br>
        	<button class="btn btn-primary pull-right">إرسال</button>
        	</div>
        	<br>
        	<?php }?>
		</div>
	</div>
</div>
<br><br>
</div>
