<?php
class connectdbAndEvent{
    function HienThiAll($conn){
        $sql = "SELECT * FROM SINHVIEN";
        $query = $conn->prepare( $sql );
        $query->execute();
        /*$results =*/  
        return $query->fetchAll( PDO::FETCH_ASSOC ); 
    }
    function HienThiDaNang($conn,$quequan){
        $sql = "SELECT * FROM SINHVIEN WHERE QueQuan LIKE :quequan";
        $query = $conn->prepare( $sql );
        $query->bindParam(':quequan',$quequan);
        $query->execute();
        /*$results =*/  
        return $query->fetchAll( PDO::FETCH_ASSOC ); 
    }
    function ThemSinhVien($conn,$masv,$tensv,$QueQuan,$ngaysinh){
        try{
            $sql = "INSERT INTO SINHVIEN (MaSV,TenSV,QueQuan,NgaySinh) VALUES (:masv,:tensv,:quequan,:ngaysinh)";
            //$sql = " UPDATE SINHVIEN SET QueQuan=:quequan WHERE MaSV=:masv ";
            $query = $conn->prepare($sql);
            $query->bindParam(':masv',$masv);
            $query->bindParam(':tensv',$tensv);
            $query->bindParam(':quequan',$QueQuan);
            $query->bindParam(':ngaysinh',$ngaysinh);
            $query->execute();
            return true ;
        }catch(Exception $e){
            return false ;
        }
    } 
    function CapNhatSinhVien($conn,$masv,$QueQuan){
        try{
            $sql = " UPDATE SINHVIEN SET QueQuan=:quequan WHERE MaSV=:masv ";
            $query = $conn->prepare($sql);
            $query->bindParam(":masv",$masv);
            $query->bindParam(':quequan',$QueQuan);
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
    function XoaSinhVien($conn,$masv){
        try{
            $sql = "DELETE FROM SINHVIEN WHERE MaSV=:masv";
            $query = $conn->prepare($sql);
            $query->bindParam("masv",$masv);
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
    function GetConn($servername,$username,$password,$dbname){
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        return $conn ;
    }
}
?>
