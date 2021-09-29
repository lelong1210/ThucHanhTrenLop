<?php
class Login extends controller{
    function show(){
        $teo = $this->call_model("LoginModel");
        $this->call_view("LoginView",[]);
    }
}
?>