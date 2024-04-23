           <header>
	            <nav class="myNavbar">
	                <img class="logo" src="./assets/img/logo.jpg">
	                <ul class="item-nav">
	                    <a href="#"><li>[<?php if(isset($_SESSION["name"])){echo $_SESSION["name"];}?>]</li></a>
	                    <a class="links" href="<?php echo URL_ROOT?>donors/index "><li>الرئيسية</li></a>
	                    <a class="links" href="<?php echo URL_ROOT.'pages/benefit'?>"><li>فوائد التبرع</li></a>
	                    <a class="links" href="<?php echo URL_ROOT.'pages/reward'?>"><li>ثواب التبرع </li></a>
	                    <a class="links" href="<?php echo URL_ROOT.'pages/privacy'?>"><li>الخصوصية</li></a>
	                    <a class="links" href="<?php echo URL_ROOT.'pages/contact'?>"><li>راسلنا</li></a>	                    
	                    <a class="links" href="<?php echo URL_ROOT.'donors/logout'?>"><li>تسجيل الخروج</li></a>
	                    <!--benefit -->
	                </ul>
	                <div id="btnMenu" class="btn-menu hamburger hamburger--arrowalt-r  ">
		                <div class="hamburger-box">
			                <div class="hamburger-inner"></div>
		                </div>
	                </div>
	            </nav>
	        </header>
	        