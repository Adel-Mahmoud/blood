<?php

    class Donors extends Controller
    { 
        public function __construct()
        {
          session_start();
          session_regenerate_id(true);
          $this->userModel = $this->model('Doner');
          
        }
      
        public function index()
        {  
           if(isset($_SESSION["name"])){
	           if ($_SERVER['REQUEST_METHOD']=='POST') {              
	               $data = [
	                  'city'       => $_POST['city'],
	                  'blood_type' => $_POST['blood_type'],
	                  'hide'       => 'd-none',
	                  'show'       => 'd-block',
	                  'donors'     => [],
	                  'search1'    => [],
	                  'search2'    => [],
	               ];
	             $data["donors"] = $this->userModel->getDataBySearch($data["city"],$data["blood_type"]);
	             $this->view('index',$data,"navbar");            
	           }
	           $data["search1"] = $this->userModel->getDataDistinct1();
	           $data["search2"] = $this->userModel->getDataDistinct2();
	           $this->view('index',$data,"navbar");          
           }else{
               header("Location:".URL_ROOT."donors/login");
           }
        } // end function index
        
        public function page404()
        {
            $this->view('404');
        } // end function 404 Errors Page
        
        public function getDataBySearch( $country = null, $city = null, $blood_type =null)
        { 
            $data = $this->userModel->getDataBySearch($city,$blood_type);
            foreach($data as $row){echo $row["user"];}
            $this->view('all-donors',$data,"navbar");
        }
        
        // login page controller
        public function login()
        {
            $data = [
               'email' => '',
               'password' => '',
               'email_err' => '',
               'pass_err' => '',
            ];
            if(isset($_SESSION["user"])){
              header("Location:".URL_ROOT."donors/index");
            }elseif(isset($_SESSION["admin"])){
              header("Location:".URL_ROOT."donors/dashboard");
            }else{
	        if ($_SERVER['REQUEST_METHOD']=='POST') {
		        $data = [
		        'email' => trim($_POST['email']),
		        'password' => trim($_POST['password']),
		        'email_err' => '',
		        'pass_err' => '',
		        ];
		        
		        if ( empty($data['email']) ) {
		           $data['email_err'] = '
		           الايميل فارغ
		           ';
		        } else if (! $this->userModel->getUserByEmail($data['email']) ) {
		        $data['email_err'] = '
		        الحساب غير موجود
		        ';
		        }		        
		        if ( empty($data['password']) ) {
		           $data['pass_err'] = '
		        كلمة سر فارغة
		           ';
		        }elseif( ! $this->userModel->getUserByPassword($data['password']) ){
		           $data['pass_err'] = '
		           كلمة سر غير صحيحه
		           ';
		        }
		        if(empty($data['pass_err']) && empty($data['email_err'])){
		                   $this->userModel->login($data['email'],$data['password']);		           
		                   $row = $this->userModel->getUserByEmail($data["email"]);
		                   $_SESSION["id"]    = $row->id;
		                   if($row->admin > 0){
		                      $_SESSION["admin"] = $data['email'];
		                      $_SESSION["name"]  = $row->username;
		                      header("Location:".URL_ROOT."donors/dashboard");		
		                   }else{
		                      $_SESSION["user"] = $data['email'];
		                      $_SESSION["name"] = $row->username;
		                      header("Location:".URL_ROOT."donors/index");		              		           
		                   }
		        }
		           $this->view('login', $data);
		     }else{
		       $data = [
		       'email' => '',
		       'password' => '',
		       'email_err' => '',
		       'pass_err' => '',
		       ];
		      }
		     }
	        $this->view('login');
        } // end function login
        
        public function logout()
        {
            unset($_SESSION['user']);
            unset($_SESSION['admin']);
            session_destroy();
            header("Location:".URL_ROOT."donors/login");
        } // end function logout
               
        public function register()
        {
            $data = [
               'username'       => '',
               'email'          => '',
               'password'       => '',
               'r_password'     => '',
               'gander'         => '',
               'name_err'       => '',
               'email_err'      => '',
               'password_err'   => '',
               'r_password_err' => ''
            ];
            if ($_SERVER['REQUEST_METHOD']=='POST'){
                $data = [
                'username'       => trim($_POST['username']),
                'email'          => trim($_POST['email']),
                'password'       => trim($_POST['password']),
                'r_password'     => trim($_POST['r_password']),
                'gander'         => $_POST['gander'],
                'name_err'       => '',
                'email_err'      => '',
                'password_err'   => '',
                'r_password_err' => ''
                ];
                if ( empty($data['username']) ) {
                   $data['name_err'] = '
                الإسم فارغ
                ';
                   }
                if(empty($data['password'])){
                   $data['password_err'] = '
                   كلمة مرور فارغه
                   ';
                }elseif(strlen($data['password'])<6){
                  $data['password_err'] = '
                  كلمة المرور اقل من 6 احرف
                  ';
                }
                if($data['password'] !== $data['r_password']){
                  $data['password_err'] = '
                  كلمة المرور غير متطابقة
                  ';           
                }
                if ( empty($data['email']) ) {
                   $data['email_err'] = '
                   الايميل فارغ
                   ';
                }
                if($this->userModel->getUserByEmail($data["email"])){
                   $data['email_err'] = "
                   الايميل مسجل بالفعل،
                   ";
                
                }else{
                  if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) ) {
                  if($this->userModel->register($data)){
                    header("Location:".URL_ROOT."donors/login");
                  }
                  }
                }
                
                $this->view('singup',$data);
            }
            $this->view('singup',$data);
        } // end function register
        
        public function addDonor()
        {
            if ($_SERVER['REQUEST_METHOD']=='POST'){
            $data = [
            'email'          => $_SESSION["user"],
            'phone'          => $_POST['phone'],
            'city'           => $_POST['city'],
            'blood_type'     => $_POST['blood_type'],
            'search'         => "",
            ];
            
            if($this->userModel->addDonor( $data)){
                header("Location:".URL_ROOT."donors/index");
            }
            
            
            
            $this->view('singup-donor',$data,"navebar");
            }
            $this->view('singup-donor',$data,"navebar");
        }
        
        public function email()
        {
           if ($_SERVER['REQUEST_METHOD']=='POST'){
              $data = [
                 'email'         => trim($_POST['email']),
                 'email_err'     => "",
                 'rand'          => rand(1, 1000000),
              ];
              $to = $data["email"];
              $title = "<h1 style='text-align:right;color:#09f;' >
              إعادة تعيين كلمة المرور
              </h1>";
              $msg = "<p style='text-align:right;'>
                      
              لقد تلقينا طلبًا لإعادة تعيين كلمة السر الخاصة بك 
              أدخل رمز إعادة تعيين كلمة السر التالي:
              <a href='#'>".$data["rand"]."</a>
              </p>";
              if ( empty($data['email']) ) {
                 $data['email_err'] = '
              الايميل فارغ
                 ';
              }else{
                 if($this->userModel->getUserByEmail($data["email"])){
                 if(mail($to,$title,$msg)){
                 echo '
                 <div style="position:abslute;top:50px;z-index:1000000" class="text-center">
                 <div class="alert alert-success text-center">
                 Success
                 </div>
                 </div>
                 ';
                 }else{
                 echo '
                 <div class="text-center" style="z-index:1000000">
                 <div class="alert alert-success text-center">
                 No Send
                 </div>
                 </div>
                 ';
                 }
                 $_SESSION["mail"] = $data['user'];
                 $this->userModel->changeCode($data);          
                 header("Location:".URL_ROOT."donors/code");
               }else{
                 $data["email_err"] = "
                 الايميل غير موجود
                 ";
               }
              }
           }
           $this->view('email',$data);
        } // end function email
        
        public function code()
        { 
           if ($_SERVER['REQUEST_METHOD']=='POST'){
               $data = [
                  'code'         => trim($_POST['code']),
                  'code_err'     => "",  
                  'email'        => "",
                  "db_code"      => ""
               ];
               if( empty( $data["code"] ) ){
                  $data["code_err"] = "
                  الحقل فارغ
                  ";
               }else{
                  $data['email'] = $_SESSION["mail"];                  
                  $data["db_code"] = $this->userModel->chickCode($data["email"]);
                  if( $data["code"] == $data["db_code"]->code ){
                    $_SESSION["newpass"] = $_SESSION["mail"];
                    unset($_SESSION["mail"]);
                    header("Location:".URL_ROOT."donors/newpassword");
                    
                  }else{
                     $data["code_err"] = "
                     الكود غير صحيح
                     ";
                  }
               }
               
               }
              $this->view('code',$data);
           } // end function code
           
           public function newpassword()
           { 
               if(isset($_SESSION["newpass"])){
	           if ($_SERVER['REQUEST_METHOD']=='POST'){              
	              $data = [
	                 'password'     => trim($_POST['password']),
	                 'np_err' => "",   
	                 'email'  => $_SESSION["newpass"]  
	              ];
	              if(empty($data['password'])){
	                 $data["np_err"] = '
	                 الحقل فارغ
	                 ';
	              }else{
	                 if( $this->userModel->updatePassword($data) ){
	                      unset($_SESSION["mail"]);
	                      unset($_SESSION["newpass"]);
	                      header("Location:".URL_ROOT."donors/login");
	                 }
	              }
	              $this->view('new-password',$data);
	              }
	            }else{
	               header("Location:".URL_ROOT."donors/login");
	            }
	           
              //
              $this->view('new-password');
           } // end function newpassword
           
           public function search()
           {   
               echo "hack" . print_r($_SESSION);
               $this->view('search',"","navebar");      
           } // end function search
           
           public function information()
           {
               $data = $this->userModel->getUsers();
               
           }
     /*
        =================
        Dashboard Control
        =================
     */      
           public function dashboard($fun=null,$id=null)
           {
               $data = [
                 'add'            => '',
                 'edit'           => '',
                 'delete'         => '',
                 'users'          => '',
                 'id'             => $id,
                 'username'       => trim($_POST['username']),
                 'email'          => trim($_POST['email']),
                 'password'       => trim($_POST['password']),
                 'r_password'     => trim($_POST['r_password']),
                 'gander'         => $_POST['gander'],
                 'admin'          => $_POST['admin'],
                 'name_err'       => '',
                 'email_err'      => '',
                 'password_err'   => '',
                 'r_password_err' => ''
                 ];
                 if(isset( $_SESSION["admin"])){      
	                 if($fun=="add"){
	                 
	                 if ($_SERVER['REQUEST_METHOD']=='POST'){
	                 
		                 if ( empty($data['username']) ) {
		                 $data['name_err'] = '
		                 الإسم فارغ
		                 ';
		                 }
		                 if ( empty($data['email']) ) {
		                 $data['email_err'] = '
		                 الايميل فارغ
		                 ';
		                 }
		                 if($this->userModel->getUserByEmail($data["email"])){
		                 $data['email_err'] = "
		                 الايميل مسجل بالفعل،
		                 ";
		                 
		                 }
		                 if(empty($data['password'])){
		                 $data['password_err'] = '
		                 كلمة المرور فارغة
		                 ';
		                 }elseif($data['password'] !== $data['r_password']){
		                    $data['password_err'] = '
		                    تأكيد كلمة المرور غير متطابق
		                    ';
		                 }
		                 if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) ) {
			                 if($this->userModel->addUser($data)){
			                     header("Location:".URL_ROOT."donors/dashboard");
			                 }	               
		                 }	   
	                 }              	                 
	                     $data["add"] = true;
	                  }elseif($fun=="edit"){
	                  
	                  if ($_SERVER['REQUEST_METHOD']=='POST'){
	                  
	                  $data = [
	                  'add'            => '',
	                  'edit'           => '',
	                  'delete'         => '',
	                  'users'          => '',
	                  'id'             => trim($_POST['id']),
	                  'username'       => trim($_POST['username']),
	                  'email'          => trim($_POST['email']),
	                  'password'       => trim($_POST['password']),
	                  'r_password'     => trim($_POST['r_pass']),
	                  'gander'         => $_POST['gander'],
	                  'admin'          => $_POST['admin'],
	                  'name_err'       => '',
	                  'email_err'      => '',
	                  'password_err'   => '',
	                  'r_password_err' => ''
	                  ];
	                  
	                     
	                     
	                     if ( empty($data['username']) ) {
	                     $data['name_err'] = '
	                     الإسم فارغ
	                     ';
	                     }
	                     if ( empty($data['email']) ) {
	                     $data['email_err'] = '
	                     الايميل فارغ
	                     ';
	                     }
	                     
	                     if(!empty($data['username']) && !empty($data['username']) ) {
	                     if($this->userModel->editUser($data)){
	                     
	                        header("Location:".URL_ROOT."donors/dashboard");
	                     }
	                     
	                     
	                     
	                     
	                     }
	                     
	                     
	                     header("Location:".URL_ROOT."donors/dashboard");
	                     
	                     }
	                     $data["edit"] = true;
	                     $data["users"] = $this->userModel->getUserById($id);
	                     $this->view('dashboard',$data);
	                     
	                  }elseif($fun=="delete"){
	                     $this->userModel->deleteUser($id);
	                     
	                  }
                  $data["users"] = $this->userModel->getData();
                  $this->view('dashboard',$data);               
               }else{
                 // header("Location:".URL_ROOT."donors/login");
                 $this->view('page-404',"","navebar");
               }
             }
 } // end class donors
           
           
     
    