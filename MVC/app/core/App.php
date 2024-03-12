<?php

class App
{
    protected $controller = "Home";
    protected $method = "index";
    protected $params = [];


    public function  __construct()
    {
        $url = $this->splitURL();
        //show($url[0]);
        //show($url);

        if(isset($url[0]))
        {
            if(file_exists('../app/controllers/' . ucfirst($url[0]) . '.php'))
            {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            }
            else
            {
                $this->controller = '_404';
                //require '../app/controllers/_404.php';
            }
        }

        require '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        //show($this->controller);

        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);

        //show($url[0]); //kukunin ung controller - 0 array
        //show($url); //display/Check laman ng variable/Debug error
        //echo '<pre>';
        //print_r($url);
        //echo '</pre>';
    }

    private function splitURL()
    {
        if (isset($_GET['url']))
        {
            $url = explode("/", trim($_GET['url'], "/"));
            return $url;
        }
    }
}

//print_r();
//print_r(explode("/", trim($_GET['url'], "/")));
//print_r(explode("/", $_GET['url']));














// __construct() - lahat ng nasa loob ng {} ay nirurun nia.