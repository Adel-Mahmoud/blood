<?php
    
    class Controller extends Helper
    {
        public function model($model)
        {
          require_once './app/models/' . $model . '.php';

          return new $model();
        }

        public function view($view,$data=null,$navbar=null)
        {
          if(file_exists('./app/views/' . $view . '.php')) {
             
             require_once ('./app/views/layout/header.php');
             if($navbar){
                require_once ('./app/views/layout/navbar.php');
                require_once ('./app/views/' . $view . '.php');
                require_once ('./app/views/layout/footer_tmp.php');
             }else{
                require_once ('./app/views/' . $view . '.php');
             }
             require_once ('./app/views/layout/footer.php');
          } else{
             require_once ('./app/views/404.php');
          }
        }
      
    }