<?php
    function CheckUser($username,$password){
        try{
            $sql = "SELECT * FROM thanhvien WHERE user_name=:user AND password=:pass";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":user",$username);
            $query->bindParam(":pass",$password);
            $query->execute();
            if($query->rowCount() > 0){
                return true ;
            }return false ;
        }catch(PDOException $e){
            echo "Fault =>". $e->getMessage();
            return false ;
        }
    }
?>