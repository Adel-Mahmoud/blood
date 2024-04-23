<?php

  class Pages extends Controller
  {
  
	  public function benefit()
	  {
		  $data = [
		  'img' => './public/img/benefit.jpg',
		  'content' => 'الهدف من الموقع هذا هو لمساعدة محتاجي الدم فقط ويمنع منعا باتا استخدام محتويات الموقع لاهداف اخرى .
		  المتبرعون وضعوا معلوماتهم لهدف نبيل ويرغبوا ان تستخدم معلوماتهم في هدف نبيل كذلك .
		  للموقع كامل الحق في ملاحقة مخالفي خصوصية الموقع قانونياً .
		  لتعديل البيانات او حذفها ارسل لنا رساله عير اتصل بنا بها رقم الجوال والدوله والمطلوب عمله حذف او البيانات المراد تعديلها'
		  ];
		  $this->view('pages',$data,"navbar");
	  }
	  
	  public function reward()
	  {
	      $data = [
	          'img' => './public/img/reward.jpg',
	          'content' => 'فضل إنقاذ حياة إنسان ( . . ومن أحياها فكأنما أحيا الناس جميعا . .) من سورة المائدة آية 32.
	          التبرع عمل إنساني نبيل لأنه يساهم في إنقاذ حياة ألاف المرضى .
	          قال رسول الله صلى الله عليه وسلم قال : بينما رجل يمشي بطريق اشتد عليه العطش فوجد بئرا فنزل فيها فشرب ثم خرج فإذا كلب يلهث يأكل الثرى من العطش فقال الرجل لقد بلغ هذا الكلب من العطش مثل الذي كان قد بلغ مني فنزل البئر فملأ خفه ماء ثم أمسكه بفيه حتى رقي فسقى الكلب فشكر الله له فغفر له قالوا : يا رسول الله إن لنا في البهائم أجرا ؟ فقال : في كل كبد رطبة أجر متفق عليه . وفي رواية للبخاري : فشكر الله له فغفر له فأدخله الجنةفقد غفر الله له وأدخله الجنة لرحمته بالكلب فما بالك بمن يحيى إنسانا يعانى ويوشك على الهلاك .
	          فضل تفريج الكربات فقد قال صلى الله عليه و سلم " من فرج عن مسلم كربة من كرب الدنيا فرج الله عنه كربة من كرب يوم القيامة" (رواه الشيخان من حديث ابن عمر، كما في اللؤلؤ والمرجان، برقم 1667).
	          فضل إعانة الضعفاء الذى هو من أسباب النصر والرزق فقد قال رسول الله صلى الله عليه وسلم ( إنما تنصرون وترزقون بضعفائكم ) وفى رواية ( وهل تنصرون وترزقون إلا بضعفائكم ) .'
	      ];
	      $this->view('pages',$data,"navbar");
	  }
	  
	  public function privacy()
	  {
	  $data = [
	  'img' => './public/img/privacy.jpg',
	  'content' => 'الهدف من الموقع هذا هو لمساعدة محتاجي الدم فقط ويمنع منعا باتا استخدام محتويات الموقع لاهداف اخرى .
	  المتبرعون وضعوا معلوماتهم لهدف نبيل ويرغبوا ان تستخدم معلوماتهم في هدف نبيل كذلك .
	  للموقع كامل الحق في ملاحقة مخالفي خصوصية الموقع قانونياً .
	  لتعديل البيانات او حذفها ارسل لنا رساله عير اتصل بنا بها رقم الجوال والدوله والمطلوب عمله حذف او البيانات المراد تعديلها'
	  ];
	  $this->view('pages',$data,"navbar");
	  }
	  
	  public function contact()
	  {
	  $data = [
	  'img' => './public/img/contact.jpg',
	  'content' => 'Contact-Us',
	  'contact_us' => 'true'
	  ];
	  $this->view('pages',$data,"navbar");
	  }
	  
	  public function about()
	  {
		  $data = [
		  'title' => 'About Us',
		  'description' => 'App to share posts with other users'
		  ];
		  $this->view('layout/about');
	  }
	  
	  public function page404()
	  {
	      $this->view('404');
	  } // end function 404 Errors Page
	  
  }