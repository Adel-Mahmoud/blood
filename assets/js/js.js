 /* ======== Open Menu Button ======== */
	    var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};      
		    var hamburgers = document.querySelectorAll(".hamburger");
		    if (hamburgers.length > 0) {
			    forEach(hamburgers, function(hamburger) {
				    hamburger.addEventListener("click", function() {
				    this.classList.toggle("is-active");
			    }, false);
		    });
	    }
 /* ========= Onload img ======== */
	    setTimeout(function(){
	        $("#load").css({display:'none'});
	    },100);
 /* ======== Button Open Menu ========*/
        var menu=0;
        $("#btnMenu").click(function() {
	        if(menu==0){
		        $(".item-nav").animate({width: '70%'},200);
		        menu++
	        }else{
		        $(".item-nav").animate({width: '0'},200);
		        menu=0;
	        } 
        });
/* ======== Citys Array Data ======== */
		const allCityText = 'القاهرة.الجيزة.الأسكندرية.الدقهلية.الشرقية.المنوفية.القليوبية.البحيرة.الغربية.بور سعيد.دمياط.الإسماعلية.السويس.كفر الشيخ.الفيوم.بني سويف.مطروح.شمال سيناء.جنوب سيناء.المنيا.أسيوط.سوهاج.قنا.البحرالاحمر .الأقصر.أسوان.الواحات.الوادي الجديد';
		const allCityArray = allCityText.split(".");
	    	allCityArray.map(function(city){
	    	document.getElementById("city").innerHTML+=`<option value="${city}">${city}</option`;
		});

 $(document).ready(function(){
       var showpassword = true;
       $('#showpassword').click(function(){
          if(showpassword == true){
            $('#password').attr('type','text');
            $('#r_password').attr('type','text');
            $(this).css('color','#09f');
            showpassword = false;
          }else{
            $('#password').attr('type','password');
            $('#r_password').attr('type','password');
            $(this).css('color','navy');
            showpassword = true;
          }
       });
 /* ======== Input Valedation ======== */   
		$('#r_password').on(function(){
		if(this.value !== "" && this.value !== window.password.value){
		   $('#msg_password_error').text('كلمة المرور غير متطابقة');
		}else{
		   $('#msg_password_error').text(' ');
		}
		}
		);
 /* ======== Search In Users ======== */		
		$("#myInput").on("keyup", function() {
		   var value = $(this).val().toLowerCase();
		   $("#myTable tr").filter(function() {
	   	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		   });
		});
 });	    