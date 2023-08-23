<?php


$autoloads= [
    "Controller",
    "Request",
    "Database",
    "Model"
];
foreach ($autoloads as $value) {
    if(file_exists('core/'.$value.".php")){
        require 'core/'.$value.".php";
    }
}

$database = new Database;
$request = new Request();
$request->getSystemParam();
$controller = $request->controller;
$action = $request->action;
$controller = new $controller;
$controller->{$action}();



