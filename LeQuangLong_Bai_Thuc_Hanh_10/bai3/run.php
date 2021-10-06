<?php
    require_once "./candidate.php";
    $solanlap = $_POST["sosinhvien"];
    $arr = [];
    echo "<form method='post' action='run.php'>" ;
    echo " <table style='border: 1px solid black'>";
    echo "Cac Hoc Sinh Co Tong Diem Lon Hon 22.5 La";
    for($i = 0 ; $i < $solanlap ; $i++){
        $arrChild = [];
        $masv = $_POST["masinhvien-$i"];
        $tensv = $_POST["tensinhvien-$i"];
        $ngaysinh = $_POST["ngaysinh-$i"];
        $diemtoan = $_POST["diemtoan-$i"];
        $diemly = $_POST["diemly-$i"];
        $diemhoa = $_POST["diemhoa-$i"];
        $sinhvien = new testcandidate();
        $sinhvien->inputSinhVien($tensv,$masv,$ngaysinh,$diemtoan,$diemly,$diemhoa);
        $arrChild = $sinhvien->outputSinhVien();
        if($arrChild[3] > 22.5){
                echo "<tr>";
                    echo "<td>$arrChild[0]</td>";
                    echo "<td>$arrChild[1]</td>";
                    echo "<td>$arrChild[2]</td>";
                    echo "<td>$arrChild[3]</td>";
                echo "</tr>";
        }
        // print_r($arrChild);
    }
    echo "</table>";
    for ($i=0; $i < $solanlap ; $i++) { 
        # code...
    }
?>