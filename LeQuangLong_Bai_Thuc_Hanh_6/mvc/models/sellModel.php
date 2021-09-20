<?php
class sellModel extends connectDB{
    protected $arr = [];
    protected $a ;
    function ShowSellTable($row_Content){
        $arrT = [];
        echo "<table class='table' style='width: 1000px;'><tr>";
        // echo "<th></th>";
        echo "<th>mã sản phẩm</th>";
        echo "<th>tên sản phẩm</th>";
        echo "<th>Thêm Vào Giỏ Hàng</th>";
        echo "<th>Số Hàng Còn Lại</th>";
        echo "</tr>";

        foreach($row_Content as $row){
            $rowEx = array_values((array) $row );
            $arrT[] = $rowEx[0];
            // echo "<tr><td><input type='checkbox' id=".$rowEx[0]." value='hello'></td>";
                echo "<td>$rowEx[0]</td>";
                echo "<td id=$rowEx[0]tensp>$rowEx[1]</td>";
                echo "<td><button id=$rowEx[0] class='btn btn-lg btn-success'>Thêm Vào Giỏ Hàng</button></td>";
                echo "<td><span id=$rowEx[0]sohangconlai>$rowEx[2]</span></td>";
            // }
            echo"</tr>";        
        }
        echo "</table>";
        // unset($this->arr);
        $this->arr = array_values($arrT);
        $_SESSION["IdCheckbox"] = $this->arr;
    }
    function GetIDCheckBox(){
        $GetID = $_SESSION["IdCheckbox"];
        return $GetID;
    }
    function GetSoluong($masp){
        $conn = $this->GetConn();
        $sql = "SELECT soluong FROM sanpham WHERE masp=:masp";
        $query = $conn->prepare($sql);
        $query->bindParam(":masp",$masp);
        $query->execute();
        if($query->rowCount() > 0){
            return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
        }else{
            return false;
        }
    }
    function GetTen($masp){
        $conn = $this->GetConn();
        $sql = "SELECT tensp FROM sanpham WHERE masp=:masp";
        $query = $conn->prepare($sql);
        $query->bindParam(":masp",$masp);
        $query->execute();
        if($query->rowCount() > 0){
            return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
        }else{
            return false;
        }
    }
    function InsertIntoHoaDon($masp,$slban,$dongia){
        try{
            $conn = $this->GetConn();
            $sql = "INSERT INTO hoadon (masp, slban, dongia) VALUES (:masp,:slban,:dongia);";
            $query = $conn->prepare($sql);
            $query->bindParam(":masp",$masp);
            $query->bindParam(":slban",$slban);
            $query->bindParam(":dongia",$dongia);
            $query->execute();
            if($query->rowCount() > 0){
                return true ;
            }else{
                return false ;
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return false ;
        }
    }
}
?>