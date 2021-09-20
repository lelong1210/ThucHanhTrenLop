<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        .header , .footer{
            background-color: tomato;
            height: 100px;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        $XuLyDB = new connectdbAndEvent();
        $conn = $XuLyDB->GetConn("localhost","root","","QLSinhVien");
    ?>
    <div class="header">
        <?php
            if( isset($_SESSION['tbsuasinhvien']) ){
                echo "<h2>Thông Báo Cập Nhật Sinh Viên</h2>";
                if($_SESSION['tbsuasinhvien']){
                    echo "<br> <h3>Cập Nhật Sinh Viên Thành Công</h3>";
                }else{
                    echo "<br> <h3>Cập Nhật Sinh Viên Thất Bại</h3>";
                }
                unset($_SESSION['tbsuasinhvien']);
            }


            if( isset($_SESSION['tbthemsinhvien']) ){
                echo "<h2>Thông Báo Thêm Sinh Viên</h2>";
                if($_SESSION['tbthemsinhvien']){
                    echo "<br> <h3>Thêm Sinh Viên Thành Công</h3>";
                }else{
                    echo "<br> <h3>Thêm Sinh Viên Thất Bại</h3>";
                }
                unset($_SESSION['tbthemsinhvien']);
            }


            if( isset($_SESSION['tbxoasinhvien']) ){
                echo "<h2>Thông Báo Xóa Sinh Viên</h2>";
                if($_SESSION['tbxoasinhvien']){
                    echo "<br> <h3>Xóa Sinh Viên Thành Công</h3>";
                }else{
                    echo "<br> <h3>Xóa Sinh Viên Thất Bại</h3>";
                }
                unset($_SESSION['tbxoasinhvien']);
            }
        ?>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-sm-6 HienThiAll">
                <?php
                    $resultall = $XuLyDB->HienThiAll($conn);
                    echo "<h2>Hien Thi Tat Ca Sinh Vien</h2>";
                    echo "<table><tr><th>MaSV</th><th>TenSV</th><th>QueQuan</th><th>NgaySinh</th></tr>";
                    foreach($resultall as $row ){
                        $arr = array_values($row) ;
                        echo "<tr><td>".$arr[0]."</td><td>".$arr[1]."</td><td>".$arr[2]."</td><td>".$arr[3]."</td></tr>";
                    }
                    echo "</table>";
                ?>
            </div>
            <div class="col-sm-6 HienThiSinhVienDaNang">
                <?php
                    $resultDN = $XuLyDB->HienThiDaNang($conn,"Đà Nẵng");
                    echo "<h2>Hien Thi Tat Ca Sinh Vien Da Nang</h2>";
                    echo "<table><tr><th>MaSV</th><th>TenSV</th><th>QueQuan</th><th>NgaySinh</th></tr>";
                    foreach($resultDN as $row ){
                        $arr = array_values($row) ;
                        echo "<tr><td>".$arr[0]."</td><td>".$arr[1]."</td><td>".$arr[2]."</td><td>".$arr[3]."</td></tr>";
                    }
                    echo "</table>";
                ?>
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-4 ThemSinhVien">
                <?php
                    $chot = false ;
                    require_once "locdulieu.php";
                    if( isset($masv) && isset($tensv) && isset($quequan)&& isset($ngaysinh) ){
                        $teo = $XuLyDB->ThemSinhVien($conn,$masv,$tensv,$quequan,$ngaysinh);
                        if($teo){
                            $_SESSION['tbthemsinhvien'] = true;
                        }else{
                            $_SESSION['tbthemsinhvien'] = false ;
                        }
                        unset($masv);
                        unset($tensv);
                        unset($quequan);
                        unset($ngaysinh);
                        $chot = true ;
                    }
                    if( isset($masv_up) && isset($quequan_up)){
                        $teo = $XuLyDB->CapNhatSinhVien($conn,$masv_up,$quequan_up);
                        if($teo){
                            $_SESSION['tbsuasinhvien'] = true ;
                        }else{
                            $_SESSION['tbsuasinhvien'] = false ;
                        }
                        unset($masv_up);
                        unset($quequan_up);  
                        $chot = true ;                  
                    }
                    if( isset($masv_delete) ){
                        $teo = $XuLyDB->XoaSinhVien($conn,$masv_delete);
                        if($teo){
                           $_SESSION['tbxoasinhvien'] = true ;
                        }else{
                           $_SESSION['tbxoasinhvien'] = false ;
                        }
                        unset($masv_delete);
                        $chot = true ;
                    };
                    if($chot){
                        header("Refresh:0");
                        $chot = false ;
                    }
                
                ?>
                <h2>Thêm Sinh Viên</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                    <table>
                        <tr>
                            <td><label>Mã Sinh Viên</label></td>
                            <td><input type="text" name="msv"></td>
                        </tr>
                        <tr>
                            <td><label>Tên Sinh Vien</label></td>
                            <td><input type="text" name="tsv"></td>
                        </tr>
                        <tr>
                            <td><label>Quê Quán</label></td>
                            <td><input type="text" name="qq"></td>
                        </tr>
                        <tr>
                            <td><label>Ngày Sinh</label></td>
                            <td><input type="text" name="ns"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="submitInsert" class="w3-border w3-border-red w3-round-large" ></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-sm-4 XoaSinhVien">
                <h2>Xóa Sinh Viên</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                    <table>
                        <tr>
                            <td><label>Mã Sinh Viên</label></td>
                            <td><input type="text" name="msvdelete"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="submitDelete" class="w3-border w3-border-red w3-round-large" ></td>
                        </tr>
                    </table>
                </form>              
            </div>
            <div class="col-sm-4 SuaThongTinSinhVien">
                <h2>Sửa Thông Tin Sinh Viên</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                    <table>
                        <tr>
                            <td><label>Mã Sinh Viên</label></td>
                            <td><input type="text" name="msvup"></td>
                        </tr>
                        <tr>
                            <td><label>Quê Quán</label></td>
                            <td><input type="text" name="qqup"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="submitUpdate" class="w3-border w3-border-red w3-round-large" ></td>
                        </tr>
                    </table>
                </form>            
            </div>
        </div>
        </div>
    <div class="footer"></div>
</body>
</html>