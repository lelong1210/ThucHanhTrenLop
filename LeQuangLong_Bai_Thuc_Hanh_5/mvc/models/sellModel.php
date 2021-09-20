<?php
class sellModel extends connectDB{
    protected $arr = [];
    protected $a ;
    function ShowSellTable($row_Content){
        $arrT = [];
        echo "<table class='table' style='width: 1000px;'><tr>";
            echo "<th>Chọn Mua</th>"; 
            echo "<th>Mã Sản Phẩm</th>"; 
            echo "<th>Tên Sản Phẩm</th>"; 
            echo "<th>Số Lượng</th>"; 
            echo "<th>Thành Tiền</th>"; 
        echo "</tr>";

        foreach($row_Content as $row){
            $rowEx = array_values((array) $row );
            $arrT[] = $rowEx[0];
            echo "<tr><td><input type='checkbox' id=".$rowEx[0]." value='hello'></td>";
            // foreach($row as $row_child){
                echo "<td>$rowEx[0]</td>";
                echo "<td>$rowEx[1]</td>";
                echo "<td><input type='text' id=".$rowEx[0]."soluong placeholder='nhập số lượng...'><span id=".$rowEx[0]."sp></span></td>";
                echo "<td><span id=".$rowEx[0]."thanhtien></span></td>";
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
            $e->getMessage();
            return false ;
        }
    }
}
?>