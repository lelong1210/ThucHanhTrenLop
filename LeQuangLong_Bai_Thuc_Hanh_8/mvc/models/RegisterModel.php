<?php
class RegisterModel extends connectDB{
    function checkUser($username,$table){
        $conn = $this->GetConn();
        $sql = "SELECT * FROM ".$table." WHERE username=:username";
        $query = $conn->prepare($sql);
        $query->bindParam(":username",$username);
        $query->execute();
        if($query->rowCount() > 0){
            return true ;
        }else{
            return false ;
        }
    }
    function InsertInto($table,$full,$user,$pass,$email){
        try{
            if($this->checkUser($user,$table)){
                //echo "ton tai";
                return false;
            }
            $conn = $this->GetConn();
            $sql = "INSERT INTO ".$table."(fullname,username,password,email) VALUES(:full,:user,:pass,:email)";
            $query = $conn->prepare( $sql );
            $query->bindParam(":full",$full);
            $query->bindParam(":user",$user);
            $query->bindParam(":pass",$pass);
            $query->bindParam(":email",$email);
            $query->execute();
            if($query->rowCount() > 0){
                $_SESSION["changeDB"] = 1 ;
                return true ;
            }else{
                return false ;
            }
        }catch(Exception $e){
            // echo "fault => ".$e->getMessage();
            return false ;
        }
    }
}
?>