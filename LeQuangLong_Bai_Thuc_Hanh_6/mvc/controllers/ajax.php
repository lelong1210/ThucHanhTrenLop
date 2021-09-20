<?php
class ajax extends controller{
    function AddProduct(){
        $tensp = $_POST["tensp"];
        $masp = $_POST["masp"];
        $soluong = $_POST["soluong"];
        $teo = $this->call_model("addModel");
        echo $teo->AddProduct($masp,$tensp,$soluong);
    }
    function deleteProduct(){
        $masp = $_POST["masp"];
        $search = $this->call_model("searchModel");
        $result = $search->searchProduct($masp);
        if($result){
            $teo = $this->call_model("deleteModel");
            $resultdelet = $teo->deleteProduct($masp);
            if($resultdelet){
                echo "Xóa Thành Công";
            }
        }else{
            echo "Không Tồn Tại Sản Phẩm";
        }
    }
    function CheckProduct(){
        $masp = $_POST["maspup"];
        $teo = $this->call_model("selecOneModel");
        $result = $teo->SelecOne($masp);
        if($result != false){
            print_r($result);
        }else{
            return false ;
        }
    }
    function updateProduct(){
        $masp = $_POST["maspup"];
        $maspchange = $_POST["maspchangup"];
        $tensp = $_POST["tenspup"];
        $soluong = $_POST["soluongup"];

        $teo = $this->call_model("updateModel");
        if($teo->updateProduct($masp,$maspchange,$tensp,$soluong)){
            echo true ;
        }else{
            echo false ;
        }
    }
    function updateProductex(){
        $masp = $_POST["maspupt"];
        $soluong = $_POST["soluongupt"];

        $teo = $this->call_model("updateModel");
        echo $teo->updateProductex($masp,$soluong) ;

    }
    function SellProduct(){
        $maspOrtensp = $_POST["spcheck"];
        $teo = $this->call_model("sellModel");
        $Search = $this->call_model("searchModel");
        $resultSearch = $Search->SearchAll($maspOrtensp);
        if($resultSearch){
            $contenRow = json_decode($resultSearch);
            $teo->ShowSellTable($contenRow);
        }else{
            echo false ;
        }
    }
    function GetIdCbx(){
        $teo = $this->call_model("sellModel");
        echo json_encode($teo->GetIDCheckBox());
    }
    function GetSoluong(){
        $MaspSoluong = $_POST["maspSL"];
        $teo = $this->call_model("sellModel");
        echo $teo->GetSoluong($MaspSoluong);
    }
    function InsertIntoHd(){
        $masp = $_POST["maspse"];
        $slban = $_POST["slbanse"];
        $dongia = $_POST["dongiase"];
        // echo $masp;
        $teo = $this->call_model("sellModel");
        echo $teo->InsertIntoHoaDon($masp,$slban,$dongia);
        // echo "insert hehe";
    }
    function GetIdCbxGioHang(){
        $teo = $this->call_model("giohangModel");
        echo (json_encode($teo->GetIDCheckBoxGioHang()));
        // echo "ha ha ha";
    }
    function KiemTraVaLayThongTin(){
        $masp = $_POST["maspgh"];
        $Search = $this->call_model("searchModel");
        if($Search->searchProduct($masp)){
            $teo = $this->call_model("selecOneModel");
            $result = $teo->SelecOne($masp);
            print_r($result);
          
        }else{
            echo false ;
        }
    }
    function ThamSanPhamGioHang(){
        $masp = $_POST["masp"];
        $tensp = $_POST["tensp"];
        $soluong = $_POST["soluong"];
        $dongia = $_POST["dongia"];
        $teo = $this->call_model("giohangModel");
        echo $teo->ThemSanPhamGioHang($masp,$tensp,$soluong,$dongia);
    }
    function XoaSanPhamGioHang(){
        $masp = $_POST["masp"];
        $teo = $this->call_model("giohangModel");
        $teo->XoaSanPhamGioHang($masp);
    }
    function CapNhatGioHang(){
        $masp = $_POST["masp"];
        $soluong = $_POST["soluong"];
        $teo = $this->call_model("giohangModel");
        echo $teo->CapNhatGioHang($masp,$soluong);
    }
    function SelectAllGioHang(){
        $teo = $this->call_model("giohangModel");
        $teo->ShowSellTable(json_decode($teo->SelectAllGioHang()));
    }
    function SelectGioHang(){
        $masp = $_POST["masp"];
        $teo = $this->call_model("giohangModel");
        echo $teo-> SelectGioHang($masp);
    }
    
}
?>
