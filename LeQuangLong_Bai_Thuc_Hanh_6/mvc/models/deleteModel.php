<?php
class deleteModel extends connectDB{
    function deleteProduct($masp){
        try{
            $conn = $this->GetConn();
            $sql = "DELETE FROM sanpham WHERE masp=:masp";
            $query = $conn->prepare($sql);
            $query->bindParam(":masp",$masp);
            $query->execute();
            if($query->rowCount() > 0){
                return true ;
            }else{
                return false ;
            }
        }catch(Exception $e){
            return false ;
        }
    }
}
?>