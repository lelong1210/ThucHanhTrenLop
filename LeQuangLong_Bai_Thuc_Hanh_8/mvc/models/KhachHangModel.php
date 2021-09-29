<?php
class KhachHangModel extends connectDB{
    function GetAll(){
        $conn = $this->GetConn();
        $sql = "SELECT * FROM thanhvien";
        $query = $conn->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }
    function GetSV(){
        return "le quang long";
    }
}
?>