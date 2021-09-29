<?php
class editpass extends controller{
    function show(){
        if(isset($_SESSION["usersename"])){
            $this->call_view("editpassView");
        }else{
            echo "Vui Lòng Đăng Nhập";
        }
    }
}
?>