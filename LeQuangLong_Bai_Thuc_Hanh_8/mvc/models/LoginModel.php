<?php
class LoginModel extends connectDB{
    function checkAcount($username,$table,$pass){
        try{
            $conn = $this->GetConn();
            $sql = "SELECT * FROM ".$table." WHERE username=:username AND password=:pass";
            $query = $conn->prepare($sql);
            $query->bindParam(":username",$username);
            $query->bindParam(":pass",$pass);
            $query->execute();
            if($query->rowCount() > 0){
                $_SESSION["usersename"] = $username;
                echo $_SESSION["usersename"];
                return true ;
            }else{
                return false ;
            }
        }catch(Exception $e){
            echo "FAULT => ".$e->getMessage();
        }
    }
}
?>