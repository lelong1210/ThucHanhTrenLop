<?php
class addModel extends connectDB{
    function AddProduct($masp,$tensp,$soluong){
        try{
            $conn = $this->GetConn();
            $sql = "INSERT INTO sanpham(masp,tensp,soluong) VALUES (:masp,:tensp,:soluong)";
            $query = $conn->prepare($sql);
            $query->bindParam(":masp",$masp);
            $query->bindParam(":tensp",$tensp);
            $query->bindParam(":soluong",$soluong);
            $query->execute();
            if($query->rowCount() > 0){
                return true ;
            }else{
                return false ;
            }
        }catch(Exception $e ){
            return false ;
        }
    }
}
?>