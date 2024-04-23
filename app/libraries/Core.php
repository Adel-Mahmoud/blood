<?php
    class Core
    {
        protected $Controller = 'donors';
        protected $Method = 'page404';
        protected $params = [];

        public function __construct()
        {
            $url = $this->getUrl();

            if (file_exists('./app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->Controller = ucwords( $url[0] );
                unset($url[0]);
            }

            require_once './app/controllers/' . $this->Controller . '.php';

            $this->Controller =  new $this->Controller;

            if (isset($url[1])) {
                if(method_exists($this->Controller, $url[1]))
                {
                    $this->Method = $url[1];
                    unset($url[1]);
                }
            }

            $this->params = $url ? array_values($url) : [];
            
            call_user_func_array([$this->Controller, $this->Method], $this->params);
        }

        public function  getUrl()
        {
            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'],'/');
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url = explode('/',$url);
                return $url;
            }
        }
    }