<?php
class editpassModel extends connectDB{
    function ChangePass($usernameNew,$passworkNew){
        try{        
            $conn = $this->GetConn();
            $sql = "UPDATE thanhvien SET password = :passwordNew WHERE username = :username";
            $query = $conn->prepare($sql);
            $query->bindParam("passwordNew",$passworkNew);
            $query->bindParam("username",$usernameNew);
            $query->execute();
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
                echo "be hon 0";
            }
        }catch(Exception $e){
            echo "FAULT => ".$e->getMessage();
        }
    }
}
?>