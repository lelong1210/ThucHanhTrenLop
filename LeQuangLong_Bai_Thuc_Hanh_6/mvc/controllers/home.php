<?php
class home extends controller{
    function show(){
        $teo = $this->call_model("homeModel");
        $this->call_view("HomeView",["table_sp"=>$teo->SelectAll(),"NameOfTable"=>"sanpham"]);
    }
    function enter(){
        echo "enter";
    }
}
?>