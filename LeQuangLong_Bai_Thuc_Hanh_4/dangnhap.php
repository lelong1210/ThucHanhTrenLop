<?php require_once "./connectAndEvenDB.php" ; $teo = new connectAndEvenDB(); ?>
<?php require_once "./functionSuppor.php" ; $sup = new functionSuppor(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="header"></div>
<div class="content">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        <h2 class="w3-center">Đăng Nhập</h2>
        
        <div class="w3-row w3-section">
        <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
            <div class="w3-rest">
            <input class="w3-input w3-border" name="username" id ="username" type="text" placeholder="username">
            </div>
        </div>

        <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
            <div class="w3-rest">
            <input class="w3-input w3-border" name="password" id ="password" type="password" placeholder="password">
            </div>
        </div>
        <input type="submit" id="btnSend" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" value="Click Me">

        </form>
        <h8><a href="./dangky.php">ĐĂNG KÝ</a></h8>
        <h8><a href="./index.php">TRANG CHỦ</a></h8>
        </div>
        <div class="footer"></div>
        <div class="showtable">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $password = md5($password);
                if($teo->ChecAcount($username,$password)){
                    $sup->ShowTable(json_decode($teo->GetColumNameOfTable()),$teo->ReturnAcount($username,$password));
                }else{
                    echo "USERNAME KHÔNG TỒN TẠI HOẶC SAI MẬT KHẨU";
                }   
            }
            ?>
        </div>
</body>
<script src="./main.js"></script>
</html>