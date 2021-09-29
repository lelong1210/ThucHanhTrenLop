<?php
class Register extends controller{
    function show(){
        $teo = $this->call_model("RegisterModel");
        $this->call_view("RegisterView",[]);
    }
}
?>