<?php
    $a = $_POST['a'];
    $b = $_POST['b'];
    $call = $_POST['call'];
    
    if($call == "+"){
       echo Tong($a,$b);
    }
    else if($call == "-"){
        echo Hieu($a,$b);
    }
    else if($call == "/"){
        echo Thuong($a,$b);
    }
    else if($call =="x"){
        echo Tich($a,$b);
    }


    function Tong($a,$b){
        return $a + $b;
    }
    function Hieu($a,$b){
        return $a - $b;
    }
    function Tich($a,$b){
        return $a * $b;
    }
    function Thuong($a,$b){
        return $a / $b;
    }
?>