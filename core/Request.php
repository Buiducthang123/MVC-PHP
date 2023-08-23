<?php
//Xử lý route
class Request{
    public $controller = "HomeController";
    public $action = "index";

    function get($name) {
        return $_GET[$name]??null;
    }
    function post($name) {
        return $_POST[$name]??null;
    }
    function getSystemParam() {
        $controller = $this->get('controller');
        $controller = ucfirst($controller). "Controller";
        echo $controller;

        if(!file_exists('controllers/'.$controller.".php")){
            require 'controllers/'.$this->controller.".php";
            return 0;
        }
        $this->controller=$controller;
        require 'controllers/'.$this->controller.".php";
       

        $action = $this->get('action');
        $action = strtolower($action);
      
        if(method_exists($controller,$action)){
            $this->action = $action;
        }
        
       
    }
}