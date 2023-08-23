<?php
class postModel extends Model
{
    /**
     * Class constructor.
     */
    public $primaryKey = "ma_bviet";

    public function __construct()
    {
        parent::__construct();
        echo "PostModel đã đc tạo";
    }

    
}
