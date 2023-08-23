<?php
class controller
{
    
    protected function LoadModel($name)
    {
        $modelName = $name . "Model";
        if(file_exists('models/'.$modelName.".php")){
            require_once 'models/'.$modelName.".php";
        }
    }
    protected function LoadView($name,$data){
        
        $viewName =  $name . "View";
        $a = "â";
        if(file_exists('views/'.$viewName.".php")){ 
            require 'views/'.$viewName.".php";
        }
    }
}
