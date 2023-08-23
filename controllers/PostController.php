<?php
class PostController extends controller{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->loadModel('post');
    }
    function index()  {
        echo "post index";
    }
    function showPost() {
        $post = new postModel;
        $posts = $post->getAllPost();
        $this->loadView('Post',$posts);
    }

    
}