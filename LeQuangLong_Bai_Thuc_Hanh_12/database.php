<?php
class databse{
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbName = "QLDANGKY";
    protected $sql1 = "CREATE TABLE SINHVIEN(
        MaSV int(11) AUTO_INCREMENT PRIMARY KEY, 
        Ten varchar(30) NOT NULL,
        Lop varchar(30) NOT NULL,
        Nganh varchar(30) NOT NULL
    )";
    protected $sql2 = "CREATE TABLE HOCPHAN(
        MaHP int(11) AUTO_INCREMENT PRIMARY KEY,
        Sluong int(11) NOT NULL,
        MaMH int(11) NOT NULL
    )";
    protected $sql3 = "CREATE TABLE HOC(
        MaSV int(11) NOT NULL,
        MaHP int(11) NOT NULL,
        DIEMLT int(2) NOT NULL,
        DIEMTH int(2) NOT NULL, 
        PRIMARY KEY(MaSV,MaHP)
    )";
    protected $sql4 = "CREATE TABLE MONHOC(
        MaMH int(11) AUTO_INCREMENT PRIMARY KEY,
        TenMH varchar(30) NOT NULL,
        Khoa varchar(30) NOT NULL,
        TinChi int(11) NOT NULL

    )";
    protected $sqlSVcontainHOC = "ALTER TABLE HOC ADD CONSTRAINT fk_SV_HOC FOREIGN KEY (MaSV) REFERENCES SINHVIEN(MaSV)";
    protected $sqlHPcontainHOC = "ALTER TABLE HOC ADD CONSTRAINT fk_HP_HOC FOREIGN KEY (MaHP) REFERENCES HOCPHAN(MaHP)";
    protected $sqlMHcontainHOCPHAn = "ALTER TABLE HOCPHAN ADD CONSTRAINT fk_MONHOC_HOCPHAN FOREIGN KEY (MaMH) REFERENCES MONHOC(MaMH)";
    
    protected $sqlInsert1_1 = "INSERT INTO SINHVIEN(Ten,Lop,Nganh) VALUES('Le Quang Long','20NS','KHMT')";
    protected $sqlInsert1_2 = "INSERT INTO SINHVIEN(Ten,Lop,Nganh) VALUES('Le Quang Thanh','20NS','KHMT')";

    protected $sqlInsert2_1 = "INSERT INTO HOCPHAN(Sluong,MaMH) VALUES(1,1)";
    protected $sqlInsert2_2 = "INSERT INTO HOCPHAN(Sluong,MaMH) VALUES(2,2)";

    protected $sqlInsert3_1 = "INSERT INTO HOC(MaSV,MaHP,DIEMLT,DIEMTH) VALUES(1,1,10,10)";
    protected $sqlInsert3_2 = "INSERT INTO HOC(MaSV,MaHP,DIEMLT,DIEMTH) VALUES(2,2,8,8)";

    protected $sqlInsert4_1 = "INSERT INTO MONHOC(TenMH,Khoa,TinChi) VALUES('lap trinh web','KHMT',3)";
    protected $sqlInsert4_2 = "INSERT INTO MONHOC(TenMH,Khoa,TinChi) VALUES('lap trinh java','KTPH',2)";
    
    function __construct(){
        // tao database
        $this->createDB($this->servername,$this->username,$this->password);
        // tao bang SINHVIEN
        $this->createTable($this->servername,$this->username,$this->password,$this->dbName,$this->sql1);
        // tao bang HOC PHAN
        $this->createTable($this->servername,$this->username,$this->password,$this->dbName,$this->sql2);
        // tao bang HOC
        $this->createTable($this->servername,$this->username,$this->password,$this->dbName,$this->sql3);
        // tao bang MON HOC
        $this->createTable($this->servername,$this->username,$this->password,$this->dbName,$this->sql4);
        // tao moi quan he HP --> HOC
        $this->creatRelationShip($this->servername,$this->username,$this->password,$this->dbName,$this->sqlHPcontainHOC);
        // tao moi quan he SV --> HOC
        $this->creatRelationShip($this->servername,$this->username,$this->password,$this->dbName,$this->sqlSVcontainHOC);
        // tao moi quan he MH --> HP
        $this->creatRelationShip($this->servername,$this->username,$this->password,$this->dbName,$this->sqlMHcontainHOCPHAn);
        // insert sv
        $this->insert($this->servername,$this->username,$this->password,$this->dbName,$this->sqlInsert1_1);
        $this->insert($this->servername,$this->username,$this->password,$this->dbName,$this->sqlInsert1_2);
        // insert mh
        $this->insert($this->servername,$this->username,$this->password,$this->dbName,$this->sqlInsert4_1);
        $this->insert($this->servername,$this->username,$this->password,$this->dbName,$this->sqlInsert4_2);
        //insert hp
        $this->insert($this->servername,$this->username,$this->password,$this->dbName,$this->sqlInsert2_1);
        $this->insert($this->servername,$this->username,$this->password,$this->dbName,$this->sqlInsert2_2);
        // insert hoc
        $this->insert($this->servername,$this->username,$this->password,$this->dbName,$this->sqlInsert3_1);
        $this->insert($this->servername,$this->username,$this->password,$this->dbName,$this->sqlInsert3_2);

    }
    function createDB($servername,$username,$password){
        try{
            $conn = new PDO("mysql:host=$servername",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            $sql = "CREATE DATABASE QLDANGKY";
    
            $conn->exec($sql);
    
            echo "DATABASE CREATE SUCCESSFULLY<br>";
        }catch(PDOException $e){
            echo "FAULT ==> ".$e->getMessage();
        }        
    }
    function createTable($servername,$username,$password,$dbName,$sql){
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);          
            $conn->exec($sql);
    
            echo "TABLE CREATE SUCCESSFULLY<br>";
        }catch(PDOException $e){
            echo "FAULT ==> ".$e->getMessage();
        }   
    }
    function insert($servername,$username,$password,$dbName,$sql){
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $query = $conn->prepare($sql);
            $query->execute();
            echo "INSERT SUCCESSFULLY<br>";
        }catch(PDOException $e){
            echo "FAULT ==> ".$e->getMessage();
        } 
    }
    function creatRelationShip($servername,$username,$password,$dbName,$sql){
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);          
            $conn->exec($sql);
    
            echo "CREATE RELATIONSHIP SUCCESSFULLY<br>";
        }catch(PDOException $e){
            echo "FAULT ==> ".$e->getMessage();
        }        
    }
}
?>