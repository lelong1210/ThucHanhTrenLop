<?php
    $solanlap = $_POST["sosinhvien"];
    echo "<form method='post' action='run.php'>" ;
    for($i = 0 ; $i < $solanlap ; $i++){
        echo "<h2>Nhap Sinh Vien $i</h2>";
        echo "<label>mã sinh viên</label><input name='masinhvien-$i' type='text'> <br>";
        echo "<label>tên sinh viên</label><input name='tensinhvien-$i' type='text'> <br>";
        echo "<label>ngày sinh</label><input name='ngaysinh-$i' type='text'> <br>";
        echo "<label>điểm toán</label><input name='diemtoan-$i' type='text'> <br>";
        echo "<label>điểm lý</label><input name='diemly-$i' type='text'> <br>";
        echo "<label>điểm hóa</label><input name='diemhoa-$i' type='text'> <br>";
    }
    echo "<h1 style='margin-top: 90px;'></h1>";
    echo "<label>Gui So Sinh Vien</label><input type='text' name='sosinhvien' value=$solanlap>";
    echo "<input type='submit' value='Gui'>";
    echo "</form>";
?>