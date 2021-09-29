<?php
class ajax extends controller{
    function checkUser(){
        $table = "thanhvien";
        $username = $_POST["username"];
        $teo = $this->call_model("RegisterModel");
        echo $teo->checkUser($username,$table);
    }
    function InsertInto(){
        $table = "thanhvien";
        $full = $_POST["full"];
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $email = $_POST["email"];

        $full = strtoupper($full);
        $pass = md5($pass);

        $teo = $this->call_model("RegisterModel");
        echo $teo->InsertInto($table,$full,$user,$pass,$email);

    }
    function CheckAcount(){
        $table = "thanhvien";
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        $pass = md5($pass);

        $teo = $this->call_model("LoginModel");
        echo $teo->checkAcount($user,$table,$pass);

    }
    function exportTable($result){
        echo "<table class='table'>";
        foreach($result as $row){
            echo "<tr>";
            foreach($row as $element){
                echo "<td>$element</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    function GetAll(){
        $teo = $this->call_model("KhachHangModel");
        $this->exportTable(json_decode($teo->GetAll()));
    }
    function CheckChangeDB(){
        if(isset($_SESSION)){
            $test = $_SESSION["changeDB"] ;
            if($test == 1){
                echo $test;  
            }else{
                echo 0 ;
            }          
        }
    }
    function changDB(){
        $_SESSION["changeDB"] = $_POST["ND"] ;
        $test = $_SESSION["changeDB"] ;
        echo $test;
    }
    // edit pass
    function ChangePass(){
        $user = $_SESSION["usersename"];
        $pass = $_POST["pass"];
        $pass = md5($pass);

        $teo = $this->call_model("editpassModel");
        echo $teo->ChangePass($user,$pass);
    }
    function checkPass(){
        $table = "thanhvien";
        $user = $_SESSION["usersename"];
        $pass = $_POST["pass"];

        $pass = md5($pass);

        $teo = $this->call_model("LoginModel");
        echo $teo->checkAcount($user,$table,$pass);
    }
}
?>