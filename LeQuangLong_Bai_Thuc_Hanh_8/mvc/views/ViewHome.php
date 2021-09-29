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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Home</title>
</head>
<body>
    <div class="header"></div>
    <div class="content container text-center">
        <?php //echo $data["sv"]; ?>
        <div class="row">
            <div class="col-sm-6 zoom"><a href="Login">Đăng Nhập</a></div>
            <div class="col-sm-6 zoom"><a href="Register">Đăng Ký Tài Khoản</a><br></div>
        </div>
    </div>
    <div class="showtable" id="showTable"></div>
    <div class="footer"></div>
</body>
<script src="./public/js/main.js"></script>
</html>