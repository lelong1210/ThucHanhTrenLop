<?php require_once "./connectAndEvenDB.php" ; $teo = new connectAndEvenDB(); ?>
<?php require_once "./functionSuppor.php" ; $sup = new functionSuppor() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.6.0.min.js">
    <link rel="stylesheet" href="./style.css">
    <title>THUC HANH SO 4</title>
</head>
<body>
    <div class="header"></div>
    <div class="conten">
        <?php 
            $col_name = json_decode($teo->GetColumNameOfTable());
            $row_conten = json_decode($teo->selecAll());
            $sup->ShowTable($col_name,$row_conten);
        ?>
        <h8><a href="./dangky.php">ĐĂNG KÝ</a></h8>
        <h8><a href="./dangnhap.php">ĐĂNG NHẬP</a></h8>
    </div>
    <div class="footer"></div>
</body>
<script src="./main.js" ></script>
</html>