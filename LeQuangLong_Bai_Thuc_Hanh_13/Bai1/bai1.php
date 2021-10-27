<?php
class bai1{
    protected $servername = "localhost";
    protected $username = "root";
    protected $password  = "";
    protected $dbname = "STUDENT";
    protected $sqlInsert1 = "INSERT INTO Products(NAME,PRICE,QUANTITY) VALUES('banh trang tron',23300,350)";
    protected $sqlInsert2 = "INSERT INTO Products(NAME,PRICE,QUANTITY) VALUES('hu tieu',24300,50)";
    protected $sqlInsert3 = "INSERT INTO Products(NAME,PRICE,QUANTITY) VALUES('pho bo',98300,50)";
    protected $sqlInsert4 = "INSERT INTO Products(NAME,PRICE,QUANTITY) VALUES('banh canh',3700,530)";
    protected $sqlInsert5 = "INSERT INTO Products(NAME,PRICE,QUANTITY) VALUES('banh xeo',3800,509)";
    protected $sqlSelectDB1 = "SELECT MAX(PRICE*QUANTITY)  FROM Products";
    protected $sqlSelectDB2 = "SELECT NAME,(PRICE*QUANTITY) AS SUM FROM Products WHERE (PRICE*QUANTITY)=:max ORDER BY NAME DESC";
    protected $sqlAll = "SELECT * FROM Products ORDER BY ID DESC";
    function __construct(){
        // // create dabase 
        //     $this->createDATABASE();
        // // create table
        //     $this->creataTable();
        // // insert to table
        //     $this->insert($this->sqlInsert1);
        //     $this->insert($this->sqlInsert2);
        //     $this->insert($this->sqlInsert3);
        //     $this->insert($this->sqlInsert4);
        //     $this->insert($this->sqlInsert5);
        // // thuc hien cau hoi
        echo "<h2>GOC</h2>";
        $this->showtableALL($this->sqlAll);
        echo "<br>";
        echo "<h2>KET QUA</h2>";
        $this->showtable();
    }
    function getConn(){
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conn ;
    }
    function createDATABASE(){
        try{
            $conn = new PDO("mysql:host=$this->servername",$this->username,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql = "CREATE DATABASE STUDENT";
            $conn->exec($sql);
            echo "create database successfully";
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function creataTable(){
        try{
            $conn = $this->getConn();
            $sql = "CREATE TABLE Products(
                ID INT(11) AUTO_INCREMENT NOT NULL,
                NAME VARCHAR(30) NOT NULL,
                PRICE INT(11) NOT NULL,
                QUANTITY INT(11) NOT NULL,
                PRIMARY KEY (ID)
            )";
            $conn->exec($sql);
            echo "create table success";
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function insert($sql){
        try{
            $conn = $this->getConn();
            $query = $conn->prepare($sql);
            $query->execute();
            if($query->rowCount() > 0){
                echo "insert successfully";
            }else{
                echo "insert failt";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function getMax($sql){
        try{
            $conn = $this->getConn();
            $query = $conn->prepare($sql);
            $query->execute();
            if($query->rowCount() > 0){
                $arr = $query->fetchAll(PDO::FETCH_ASSOC);
                $arr = array_values((array)$arr[0]);
                return $arr[0];
            }else{
                echo "failt";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }        
    }
    function selectheoDeBai($sql){
        try{
            $max = $this->getMax($this->sqlSelectDB1);
            $conn = $this->getConn();
            $query = $conn->prepare($sql);
            $query->bindParam(":max",$max);
            $query->execute();
            if($query->rowCount() > 0){
                $arr = $query->fetchAll(PDO::FETCH_ASSOC);
                return $arr;
            }else{
                echo "insert failt";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }        
    }
    function showtable(){
        $result = $this->selectheoDeBai($this->sqlSelectDB2);
        $arrTT = array_keys((array)$result[0]);
        // return json_encode($result);
        echo "<table style='border: 1px solid black;'>";
            echo "<tr>";
                for ($i=0; $i < count($arrTT); $i++) { 
                    echo "<th>$arrTT[$i]</th>";
                }
            echo "</tr>";
            for ($i=0; $i < count($result); $i++) { 
                $arrChild = array_values((array)$result[$i]);
                echo "<tr>";
                    for ($j=0; $j < count($arrChild); $j++) { 
                        echo "<td>$arrChild[$j]</td>";
                    }
                echo "</tr>";
            }
        echo "</table>";
    }
    function showtableALL($sql){
        try{
            $conn = $this->getConn();
            $query = $conn->prepare($sql);
            $query->bindParam(":max",$max);
            $query->execute();
            if($query->rowCount() > 0){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                $arrTT = array_keys((array)$result[0]);
                // return json_encode($result);
                echo "<table style='border: 1px solid black;'>";
                    echo "<tr>";
                        for ($i=0; $i < count($arrTT); $i++) { 
                            echo "<th>$arrTT[$i]</th>";
                        }
                    echo "</tr>";
                    for ($i=0; $i < count($result); $i++) { 
                        $arrChild = array_values((array)$result[$i]);
                        echo "<tr>";
                            for ($j=0; $j < count($arrChild); $j++) { 
                                echo "<td>$arrChild[$j]</td>";
                            }
                        echo "</tr>";
                    }
                echo "</table>";
            }else{
                echo "insert failt";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        } 
    }
}
?>