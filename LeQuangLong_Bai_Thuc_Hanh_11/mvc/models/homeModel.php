<?php
class homeModel extends connectDB{
    // Data
    function selectAllStudents(){   
        $conn = $this->GetConn();
        $sql = "SELECT * FROM thisinh";
        $query = $conn->prepare($sql);
        $query->execute();
        if($query->rowCount() > 0){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }
    }
    function addStudents($tenthisinh,$ngaysinh,$quequan,$tongdiem){
        $conn = $this->GetConn();
        $sql = "INSERT INTO thisinh(tenthisinh, ngaysinh, quequan, tongdiem) VALUES (:tenthisinh, :ngaysinh, :quequan, :tongdiem)";
        $query = $conn->prepare($sql);
        $query->bindParam(":tenthisinh",$tenthisinh);
        $query->bindParam(":ngaysinh",$ngaysinh);
        $query->bindParam(":quequan",$quequan);
        $query->bindParam(":tongdiem",$tongdiem);
        $query->execute();
        if($query->rowCount() > 0){
            return true ;
        }else{
            return false ;
        }
    }
    function deleteStudent($mathisinh){
        $conn = $this->GetConn();
        $sql = "DELETE FROM thisinh WHERE mathisinh = :mathisinh";
        $query = $conn->prepare($sql);
        $query->bindParam(":mathisinh",$mathisinh);
        $query->execute();
        if($query->rowCount() > 0){
            return true ;
        }else{
            return false ;
        }
    }
    function selectOneStudents($mathisinh){
        $conn = $this->GetConn();
        $sql = "SELECT * FROM thisinh WHERE mathisinh=:mathisinh";
        $query = $conn->prepare($sql);
        $query->bindParam(":mathisinh",$mathisinh);
        $query->execute();
        if($query->rowCount() > 0){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }else{
            return false;
        }
    }

    function selectSinhVienWhereName($tenthisinh){
        $conn = $this->GetConn();
        $tenthisinh = "%".$tenthisinh."%";
        $sql = "SELECT * FROM thisinh WHERE tenthisinh LIKE :tenthisinh";
        $query = $conn->prepare($sql);
        $query->bindParam(":tenthisinh",$tenthisinh);
        $query->execute();
        if($query->rowCount() > 0){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }else{
            return false;
        }        
    }

    function updateStudents($mathisinh,$tenthisinh,$ngaysinh,$quequan,$tongdiem){
        $conn = $this->GetConn();
        $sql = "UPDATE thisinh SET tenthisinh = :tenthisinh, ngaysinh = :ngaysinh, quequan = :quequan, tongdiem = :tongdiem WHERE mathisinh = :mathisinh";
        $query = $conn->prepare($sql);
        $query->bindParam(":mathisinh",$mathisinh);
        $query->bindParam(":tenthisinh",$tenthisinh);
        $query->bindParam(":ngaysinh",$ngaysinh);
        $query->bindParam(":quequan",$quequan);
        $query->bindParam(":tongdiem",$tongdiem);
        $query->execute();
        if($query->rowCount() > 0){
            return true ;
        }else{
            return false;
        }
    }
    function selectOneStudentsWhereTongDiem($tongdiem){
        $conn = $this->GetConn();
        $sql = "SELECT * FROM thisinh WHERE tongdiem >= :tongdiem";
        $query = $conn->prepare($sql);
        $query->bindParam(":tongdiem",$tongdiem);
        $query->execute();
        if($query->rowCount() > 0){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }else{
            return false;
        }
    }





    // View 
    function showAllStudent(){
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $count = count($arr);
        $countTitle = count($arrTitle);
        echo "<table class='table'>";
            echo "<tr>";
                for ($i=0; $i < $countTitle; $i++) { 
                    echo "<th>$arrTitle[$i]</th>";
                }
            echo "</tr>";
            for ($i=0; $i < $count; $i++) { 
                echo "<tr>";
                    $arrChild = array_values((array)$arr[$i]);
                    for ($j=0; $j < $countTitle; $j++) { 
                        echo "<td>$arrChild[$j]</td>";
                    }
                echo "</tr>";
            }
        echo "</table>";
    }
    function getTitle($arr){
        return $arrTitle = array_keys((array)$arr[0]);
    }
    function showFormInput(){
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $countTitle = count($arrTitle);
        echo "<table>";
            for ($i=1; $i < $countTitle; $i++) {
                echo "<tr>"; 
                    echo "<th>$arrTitle[$i]</th>";
                    echo "<th><input type='text' id='$arrTitle[$i]them'></th>";
                echo "</tr>";
            }
        echo "</table>";     
        echo "<button id='them'>Thêm</button>";   
    }
    function showFormInputXoa(){
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $countTitle = count($arrTitle);
        echo "<table>";
            for ($i=0; $i < 1; $i++) {
                echo "<tr>"; 
                    echo "<th>$arrTitle[1]</th>";
                    echo "<th><input type='text' id='$arrTitle[1]xoa'></th>";
                echo "</tr>";
            }
        echo "</table>";     
        echo "<button id='xoa'>Xóa</button>";          
    }
    function showFormInputSuaWhere(){
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $countTitle = count($arrTitle);
        echo "<table>";
            for ($i=0; $i < 1; $i++) {
                echo "<tr>"; 
                    echo "<th>$arrTitle[1]</th>";
                    echo "<th><input type='text' id='suaTai' placeholder='nhập tên sinh viên muốn Sửa...'></th>";
                echo "</tr>";
            }
        echo "</table>";     
        echo "<button id='suaWhere'>Đi</button>";    
    }
    function showFormInputSua($mathisinh){
        $arrContent = array_values((array)json_decode($this->selectOneStudents($mathisinh)));
        $arrContent = array_values((array)$arrContent[0]);
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $countTitle = count($arrTitle);
        echo "<table>";
            for ($i=1; $i < $countTitle; $i++) {
                echo "<tr>"; 
                    echo "<th>$arrTitle[$i]</th>";
                    echo "<th><input type='text' id='$arrTitle[$i]sua' value='$arrContent[$i]' ></th>";
                echo "</tr>";
            }
        echo "</table>";     
        echo "<button id='sua'>Sửa</button>"; 
    }
    function showAllStudentWhereNameTK($tenthisinh){
        $arr = array_values((array)json_decode($this->selectSinhVienWhereName($tenthisinh)));
        $arrTitle = $this->getTitle($arr);
        $count = count($arr);
        $countTitle = count($arrTitle);
        echo "<table class='table'>";
            echo "<tr>";
                for ($i=0; $i < $countTitle; $i++) { 
                    echo "<th>$arrTitle[$i]</th>";
                }
            echo "</tr>";
            for ($i=0; $i < $count; $i++) { 
                echo "<tr>";
                    $arrChild = array_values((array)$arr[$i]);
                    for ($j=0; $j < $countTitle; $j++) { 
                        echo "<td>$arrChild[$j]</td>";
                    }
                echo "</tr>";
            }
        echo "</table>";         
    }
    function showAllStudentWhereName($tenthisinh){
        $arr = array_values((array)json_decode($this->selectSinhVienWhereName($tenthisinh)));
        $arrTitle = $this->getTitle($arr);
        $count = count($arr);
        $countTitle = count($arrTitle);
        echo "<table class='table'>";
            echo "<tr>";
                for ($i=0; $i < $countTitle; $i++) { 
                    echo "<th>$arrTitle[$i]</th>";
                }
                echo "<th>Sửa</th>";
            echo "</tr>";
            for ($i=0; $i < $count; $i++) { 
                echo "<tr>";
                    $arrChild = array_values((array)$arr[$i]);
                    for ($j=0; $j < $countTitle; $j++) { 
                        echo "<td>$arrChild[$j]</td>";
                    }
                    echo "<td><button id='$arrChild[0]'>Sửa</button></td>";
                echo "</tr>";
            }
        echo "</table>";        
    }
    function showAllStudentWhereNameXoa($tenthisinh){
        $arr = array_values((array)json_decode($this->selectSinhVienWhereName($tenthisinh)));
        $arrTitle = $this->getTitle($arr);
        $count = count($arr);
        $countTitle = count($arrTitle);
        echo "<table class='table'>";
            echo "<tr>";
                for ($i=0; $i < $countTitle; $i++) { 
                    echo "<th>$arrTitle[$i]</th>";
                }
                echo "<th>Sửa</th>";
            echo "</tr>";
            for ($i=0; $i < $count; $i++) { 
                echo "<tr>";
                    $arrChild = array_values((array)$arr[$i]);
                    for ($j=0; $j < $countTitle; $j++) { 
                        echo "<td>$arrChild[$j]</td>";
                    }
                    echo "<td><button id='$arrChild[0]'>Xóa</button></td>";
                echo "</tr>";
            }
        echo "</table>";        
    }


    function showAllStudentWhereTongDiem($tongdiem){
        $arr = array_values((array)json_decode($this->selectOneStudentsWhereTongDiem($tongdiem)));
        $arrTitle = $this->getTitle($arr);
        $count = count($arr);
        $countTitle = count($arrTitle);
        echo "<table class='table'>";
            echo "<tr>";
                for ($i=0; $i < $countTitle; $i++) { 
                    echo "<th>$arrTitle[$i]</th>";
                }
            echo "</tr>";
            for ($i=0; $i < $count; $i++) { 
                echo "<tr>";
                    $arrChild = array_values((array)$arr[$i]);
                    for ($j=0; $j < $countTitle; $j++) { 
                        echo "<td>$arrChild[$j]</td>";
                    }
                echo "</tr>";
            }
        echo "</table>";
    }
    function showFormInputTimKiem(){
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $countTitle = count($arrTitle);
        echo "<table>";
            for ($i=0; $i < 1; $i++) {
                echo "<tr>"; 
                    echo "<th>$arrTitle[$i]</th>";
                    echo "<th><input type='text' id='timkiemWhere' placeholder='tổng điểm muốn tìm...'></th>";
                echo "</tr>";
            }
        echo "</table>";     
        echo "<button id='timkiem'>Đi</button>";       
    }
    
}
?>