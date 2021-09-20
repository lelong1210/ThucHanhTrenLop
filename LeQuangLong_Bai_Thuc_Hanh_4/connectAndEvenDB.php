<?php
class connectAndEvenDB{
    protected $servername  = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "qlthanhvien";
    protected $conn ;
    function __construct(){
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $this->conn ;
    }
    function selecAll(){
        try{
            $sql = "SELECT * FROM thanhvien";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result) ;
        }catch(PDOException $e){
            echo "Fault =>". $e->getMessage();
            return false ;
        }
    }
    function InsertSinhVien($fullname,$username,$password,$email){
        try{
            $sql = "INSERT INTO thanhvien(full_name,user_name,password,email) VALUES(:fullname,:user,:pass,:email)";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":fullname",$fullname);
            $query->bindParam(":user",$username);
            $query->bindParam(":pass",$password);
            $query->bindParam(":email",$email);
            $query->execute();
            if( $query->rowCount() > 0 ){
                return true ;
            }return false ;
        }catch(PDOException $e){
            echo "Fault =>". $e->getMessage();
            return false ;
        }
    }
    function ChecAcount($username,$password){
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
    function ReturnAcount($username,$password){
        try{
            $sql = "SELECT * FROM thanhvien WHERE user_name=:user AND password=:pass";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":user",$username);
            $query->bindParam(":pass",$password);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result ;
        }catch(PDOException $e){
            echo "Fault =>". $e->getMessage();
        }
    }
    function CheckUser($username){
        try{
            $sql = "SELECT * FROM thanhvien WHERE user_name=:user";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":user",$username);
            $query->execute();
            if($query->rowCount() > 0){
                return true ;
            }return false ;
        }catch(PDOException $e){
            echo "Fault =>". $e->getMessage();
            return false ;
        }
    }
    function GetColumNameOfTable(){
        $arr = [] ;
        $sql = "DESCRIBE thanhvien";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $arr_child = array_values($row);
            $arr[] = $arr_child[0];
        }
        return json_encode($arr);
    }
}
?>
