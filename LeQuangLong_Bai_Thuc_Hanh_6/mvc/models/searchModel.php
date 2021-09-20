<?php
class searchModel extends connectDB{
    function searchProduct($masp){
        try{
            $conn = $this->GetConn();
            $sql = "SELECT * FROM sanpham WHERE masp=:masp";
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
    function SearchAll($maspOrtensp){
        try{
            $maspOrtensp = "%".$maspOrtensp."%";
            $conn = $this->GetConn();
            $sql = "SELECT * FROM sanpham WHERE masp LIKE :masp OR tensp LIKE :tensp";
            $query = $conn->prepare($sql);
            $query->bindParam(":masp",$maspOrtensp);
            $query->bindParam(":tensp",$maspOrtensp);
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