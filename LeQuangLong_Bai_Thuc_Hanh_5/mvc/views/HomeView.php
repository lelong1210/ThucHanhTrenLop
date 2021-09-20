<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Home</title>
</head>
<body>
    <div class="header"></div>
    <div class="content">
        <table class="table  text-center" style="width: 1000px;">
            <tr><th>Thao Tác</th></tr>
            <tr><td><a href="./add/AddProduct">Thêm Sản Phẩm</a></td></tr>
            <tr><td><a href="./sell/sellProduct">Mua Sản Phẩm</a></td></tr>
            <tr><td><a href="./update/updateProduct">Cập Nhật Sản Phẩm</a></td></tr>
            <tr><td><a href="./delete/deleteProduct">Xóa Sản Phẩm</a></td></tr>
        </table>
    </div>
    <div class="danhsachsanpham" style="margin-top: 10%;">
        <h2>BẢNG SẢN PHẨM</h2>
        <?php 
            require_once "support/functionSupportView.php";
            $teo = new functionSupportView();
            $rowConten = json_decode($data["table_sp"]);
            $columName = json_decode($teo->GetColumNameOfTable($data["NameOfTable"]));
            $teo->ShowTable($columName,$rowConten);
            
        ?>
    </div>
    <div class="footer"></div>
</body>
<!-- <script src="./public/js/main.js"></script> -->
</html>