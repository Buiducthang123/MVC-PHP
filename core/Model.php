<?php
class Model
{
    private $conn;
    private $table;
    function __construct()
    {
        $db = new Database;
        $this->conn = $db->getConnection();
    }
    function getConnection(){
        return $this->conn;
    }
    function table($tableName) {
        $this->table = $tableName;
        // echo "<br>";
        // echo $this->table;
        // echo "<br>";
        return $this;
    }
    function getAll() {
        // $conn = $this->conn;
        print_r($this->conn);
        $sql = "SELECT * FROM $this->table";
        $result = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    //Thêm
    function insert($data = []) {
        $dataKeys = array_keys($data);
        $fields = implode(', ', $dataKeys);
    
        $placeholders = implode(', ', array_fill(0, count($dataKeys), '?'));
    
        $stmt = $this->conn->prepare("INSERT INTO `$this->table` ($fields) VALUES ($placeholders)");
    
        // Gán giá trị cho các tham số
        $types = "";
        foreach ($data as $value) {
            if (is_int($value)) {
                $types .= "i";
            } elseif (is_double($value)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }
        $stmt->bind_param($types, ...array_values($data));
    
        if ($stmt->execute()) {
            echo "Tạo thành công";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    }
    //Xóa
    function delete(string $primaryKeyName, int $primaryKeyValue) {
        if(!$this->checkIdExists($primaryKeyName,$primaryKeyValue)){
            echo "Không tồn tại id";
            return 0;
        }

        $sql = "DELETE FROM $this->table WHERE $primaryKeyName = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $primaryKeyValue);
        
        if ($stmt->execute()) {
            echo "Xóa thành công";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
        
        $stmt->close();
    }
    //Kiểm tra khóa có tồn tại không
    function checkIdExists($primaryKeyName, $primaryKeyValue) {
        
        $sql = "SELECT $primaryKeyName FROM $this->table WHERE $primaryKeyName = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $primaryKeyValue);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $stmt->close();
        
        return ($row !== null);
    }
    
    //Sửa
    function update($primaryKeyName, $primaryKeyValue, $data = []) {
        if(!$this->checkIdExists($primaryKeyName,$primaryKeyValue)){
            echo "Không tồn tại id";
            return 0;
        }
        $updateFields = array_map(function($field) {
            return "$field = ?";
        }, array_keys($data));
        $updateFieldsString = implode(', ', $updateFields);
        
        $sql = "UPDATE $this->table SET $updateFieldsString WHERE $primaryKeyName = ?";
        echo $sql;
        $stmt = $this->conn->prepare($sql);
        
        $types = "";
        foreach ($data as $value) {
            if (is_int($value)) {
                $types .= "i";
            } elseif (is_double($value)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }
        $types .= "i"; // Kiểu dữ liệu cho primaryKeyValue
        
        $bindValues = array_merge(array_values($data), [$primaryKeyValue]);
        $stmt->bind_param($types, ...$bindValues);
        
        if ($stmt->execute()) {
            echo "Cập nhật thành công";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }
    
    

}
