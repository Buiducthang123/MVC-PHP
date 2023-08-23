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
        //Gọi tạo mới model
        $post = new postModel;
        //Gọi bảng cần truy vấn
        $post->table('baiviet');
        //Sd hà getAll có sẵn đề lấy toàn bộ dữ liệu table
        $posts = $post->getAll();
        // $this->loadView('Post',$posts);
        $data = array(
            'tieude' => "Tiêu đề giả mạo",
            'ten_bhat' => "Tên bài hát giả mạo",
            'baiviet.ma_tloai' => 1,
            'tomtat' => "Tóm tắt giả mạo",
            'noidung' => "Nội dung giả mạo",
            'baiviet.ma_tgia' => 2,
            'ngayviet' => "2023-08-22",
            'hinhanh' => "duongdan/anh.png"
        );
        //Tạo một dữ liệu mới
        // $post->insert($data);
        //Xóa 1 bài viết
        // $post->delete($post->primaryKey,3);
        //Update 1 bài viết
        $dataUpdate = array(
            'tieude' => "Tiêu đề giả mạo",
            'ten_bhat' => "Tên bài hát giả mạo022222",
        );
        // $post->update($post->primaryKey,4,$dataUpdate);

    }

    
}