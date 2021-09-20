<?php
class updateModel extends connectDB{
    function updateProduct($masp,$maspchange,$tensp,$soluong){
        try{
            $conn = $this->GetConn();
            $sql = "UPDATE sanpham SET masp=:maspchange,tensp=:tensp,soluong=:soluong WHERE masp=:masp;";
            $query = $conn->prepare($sql);
            $query->bindParam(":masp",$masp);
            $query->bindParam(":maspchange",$maspchange);
            $query->bindParam(":tensp",$tensp);
            $query->bindParam(":soluong",$soluong);
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
    function updateProductex($masp,$soluong){
        try{
            $conn = $this->GetConn();
            $sql = "UPDATE sanpham SET soluong=:soluong WHERE masp=:masp;";
            $query = $conn->prepare($sql);
            $query->bindParam(":masp",$masp);
            $query->bindParam(":soluong",$soluong);
            $query->execute();
            if($query->rowCount() > 0){
                return true ;
            }else{
                return false ;
            }
        }catch(Exception $e){
             $e->getMessage();
            return false ;
        }
    }
}
?>