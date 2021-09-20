<?php
class giohangModel extends connectDB{
    function ThemSanPhamGioHang($masp,$tensp,$soluong,$dongia){
        try{
            $conn = $this->GetConn();
            $sql = "INSERT INTO giohang(masp, tensp, soluong, dongia) VALUES (:masp,:tensp,:soluong,:dongia)";
            $query = $conn->prepare($sql);
            $query->bindParam(":masp",$masp);
            $query->bindParam(":tensp",$tensp);
            $query->bindParam(":soluong",$soluong);
            $query->bindParam(":dongia",$dongia);
            $query->execute();
            if($query->rowCount() > 0){
                return true ;
            }else{
                return false ;
            }
        }catch(Exception $e ){
            return false ;
        }
    }
    function XoaSanPhamGioHang($masp){
        try{
            $conn = $this->GetConn();
            $sql = "DELETE FROM giohang WHERE masp=:masp";
            $query = $conn->prepare($sql);
            $query->bindParam(":masp",$masp);
            $query->execute();
            if($query->rowCount() > 0){
                return true ;
            }else{
                return false ;
            }
        }catch(Exception $e ){
            return false ;
        }        
    }
    function CapNhatGioHang($masp,$soluong){
        try{
            $conn = $this->GetConn();
            $sql = "UPDATE giohang SET soluong=:soluong WHERE masp=:masp";
            $query = $conn->prepare($sql);
            $query->bindParam(":masp",$masp);
            $query->bindParam(":soluong",$soluong);
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
    function SelectGioHang($masp){
        $conn = $this->GetConn();
        $sql = "SELECT * FROM giohang WHERE masp=:masp";
        $query = $conn->prepare($sql);
        $query->bindParam(":masp",$masp);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }
    function ShowSellTable($row_Content){
        $arrT = [];
        echo "<table class='table text-center' style='width: 1000px;'><tr>";
            echo "<th>Chọn Mua</th>"; 
            echo "<th>Mã Sản Phẩm</th>"; 
            echo "<th>Tên Sản Phẩm</th>"; 
            echo "<th>Số Lượng</th>";
            echo "<th>Đơn Giá</th>";  
            echo "<th>Thành Tiền</th>"; 
            echo "<th><i class='far fa-trash-alt'></i></th>"; 
        echo "</tr>";

        foreach($row_Content as $row){
            $rowEx = array_values((array) $row );
            $arrT[] = $rowEx[0];
            echo "<tr id=$rowEx[0]Row><td><input type='checkbox' id=$rowEx[0]></td>";
                echo "<td>$rowEx[0]</td>";
                echo "<td>$rowEx[1]</td>";
                echo "<td><button id=$rowEx[0]giam>-</button><input type='text' value=$rowEx[2] id=$rowEx[0]Valuesoluong><button id=$rowEx[0]tang>+</button><span style='color:red' id=$rowEx[0]loisoluong></span></td>";
                echo "<td id=$rowEx[0]dongia>$rowEx[3] vnd</td>";
                $result = $rowEx[2]*$rowEx[3];
                echo "<td><span id=$rowEx[0]thanhtien>$result vnd</span></td>";
                echo "<td><span id=$rowEx[0]xoa><i class='far fa-trash-alt'></i></span></td>";
            echo"</tr>";        
        }
        echo "</table>";
        $this->arr = array_values($arrT);
        $_SESSION["IdCheckboxGioHang"] = $this->arr;
        echo "<button id='btn_ThanhToan' class='btn btn-lg btn-success'>Thanh Toán</button>";
    }
    function SelectAllGioHang(){
        $conn = $this->GetConn();
        $sql = "SELECT * FROM giohang";
        $query = $conn->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }
    function GetIDCheckBoxGioHang(){
        $GetID = $_SESSION["IdCheckboxGioHang"];
        return $GetID;
    }
    function SelecOne($masp){
        try{
            $conn = $this->GetConn();
            $sql = "SELECT * FROM giohang WHERE masp=:masp";
            $query = $conn->prepare($sql);
            $query->bindParam(":masp",$masp);
            $query->execute();
            if($query->rowCount() > 0){
                return true ;
            }else{
                return false ;
            }
        }catch(Exception $e){
            return false ;
        }
    }
}