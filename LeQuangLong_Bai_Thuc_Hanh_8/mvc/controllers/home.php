<?php
class home extends controller{
    function show(){
        $teo = $this->call_model("KhachHangModel");
        $this->call_view("ViewHome",["sv"=>$teo->GetSV()]);
    }
    function enter(){
        echo "enter";
    }
}
?>