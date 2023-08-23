<?php
class postModel extends Model
{
    /**
     * Class constructor.
     */

    public function __construct()
    {
        echo "PostModel đã đc tạo";
    }
    public function getAllPost()
    {
        $this->connectdb();
        $conn = $this->getConnection();
        $sql = "SELECT * FROM baiviet";
        $result = mysqli_query($conn, $sql);
        $posts = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row;
        }
        
        return $posts;
    }
}
