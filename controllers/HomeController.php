<?php
class HomeController extends controller{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        
    }
    public function index() {
        echo "Bạn đang ở trang index";
    }
    public function test() {
        echo "action test in Home";
    }
}