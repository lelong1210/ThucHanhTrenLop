<?php
class bai2{
    protected $servername = "localhost";
    protected $username = "root";
    protected $password  = "";
    protected $dbname = "STUDENT";
    protected $sqlInsert1 = "INSERT INTO USER(NAME,SCORE) VALUES('le quang long tranh',5)";
    protected $sqlInsert2 = "INSERT INTO USER(NAME,SCORE) VALUES('le van tan ho dau',12)";
    protected $sqlInsert3 = "INSERT INTO USER(NAME,SCORE) VALUES('nguyen thi hang ngoa ho',9)";
    protected $sqlInsert4 = "INSERT INTO USER(NAME,SCORE) VALUES('le van phuoc tang long',2)";
    protected $sqlInsert5 = "INSERT INTO USER(NAME,SCORE) VALUES('nguyen thi ngoc linh nhi',11)";
    protected $sqlSelectDB = "SELECT * FROM USER ORDER BY SCORE DESC LIMIT 2,3";
    protected $sqlALL = "SELECT * FROM USER ORDER BY USER.SCORE DESC";
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
        $this->showtableALL($this->sqlALL);
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
            $sql = "CREATE TABLE USER(
                ID INT(11) AUTO_INCREMENT NOT NULL,
                NAME VARCHAR(30) NOT NULL,
                SCORE INT(11) NOT NULL,
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
    function selectheoDeBai($sql){
        try{
            $conn = $this->getConn();
            $query = $conn->prepare($sql);
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
        $result = $this->selectheoDeBai($this->sqlSelectDB);
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