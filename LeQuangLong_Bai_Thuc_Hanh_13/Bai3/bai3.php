<?php
class bai3{
    protected $servername = "localhost";
    protected $username = "root";
    protected $password  = "";
    protected $dbname = "STUDENT";
    protected $sqlInsert1 = "INSERT INTO GRADES(NAME,MIDTERM1,MIDTERM2,FINAL) VALUES('le quang long tranh',100,100,200)";
    protected $sqlInsert2 = "INSERT INTO GRADES(NAME,MIDTERM1,MIDTERM2,FINAL) VALUES('le van tan ho dau',80,90,170)";
    protected $sqlInsert3 = "INSERT INTO GRADES(NAME,MIDTERM1,MIDTERM2,FINAL) VALUES('nguyen thi hang ngoa ho',87,78,182)";
    protected $sqlInsert4 = "INSERT INTO GRADES(NAME,MIDTERM1,MIDTERM2,FINAL) VALUES('le van phuoc tang long',77,98,196)";
    protected $sqlInsert5 = "INSERT INTO GRADES(NAME,MIDTERM1,MIDTERM2,FINAL) VALUES('nguyen thi ngoc linh nhi',55,60,180)";
    protected $sqlSelectDB = "SELECT *,((MIDTERM1*0.25)+(MIDTERM2*0.25)+(FINAL*0.5)) AS SUM FROM GRADES WHERE 1;";
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
            $sql = "CREATE TABLE GRADES(
                ID INT(11) AUTO_INCREMENT NOT NULL,
                NAME VARCHAR(30) NOT NULL,
                MIDTERM1 INT(11) NOT NULL,
                MIDTERM2 INT(11) NOT NULL,
                FINAL INT(11) NOT NULL,
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
}
?>