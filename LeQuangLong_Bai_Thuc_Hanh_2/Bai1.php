<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $number = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $number = $_POST["input_number"];
            
        }        
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h1>Nhập n</h1>
        <input type="text" name="input_number">
        <input type="submit" name="submit">
    </form>
    <?php
        for($i = 1; $i <= $number ; $i++){
            if($i % 3 == 0 && $i % 5 == 0){
                echo "". $i ."=> TRUE FALSE <br>";
            }else{
                if($i % 3 == 0){
                    echo "". $i ." => FALSE <br>";
                }
                if($i % 5 == 0){
                    echo "". $i ."=> TRUE <br>";
                }
            }
        }
    ?>
</body>
</html>