<?php
class homeModel extends connectDB{
    function SelectAll(){
        $conn = $this->GetConn();
        $sql = "SELECT * FROM sanpham";
        $query = $conn->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }
}
?>