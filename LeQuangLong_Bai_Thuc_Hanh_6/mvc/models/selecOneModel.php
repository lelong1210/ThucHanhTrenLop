<?php 
class selecOneModel extends connectDB{
    function SelecOne($masp){
        try{
            $conn = $this->GetConn();
            $sql = "SELECT * FROM sanpham WHERE masp=:masp";
            $query = $conn->prepare($sql);
            $query->bindParam(":masp",$masp);
            $query->execute();
            if($query->rowCount() > 0){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return json_encode($result);
            }else{
                return false ;
            }
        }catch(Exception $e){
            return false ;
        }
    }
}
?>