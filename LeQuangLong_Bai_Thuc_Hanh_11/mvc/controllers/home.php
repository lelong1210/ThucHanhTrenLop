<?php
class home extends controller{
    function show(){
        $model = $this->call_model("homeModel");
        $this->call_view("homeView",[
            "model"=>$model
            
        ]);
    }
}
?>