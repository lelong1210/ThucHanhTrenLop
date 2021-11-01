<?php
class ajax extends controller{
    function show(){
        $ngaynhap = date("Y-m-d h:i:s");
        echo $ngaynhap; 
    }
        // upload file 
    function uploadfile(){
       $model = $this->call_model("uploadModel");
       $model->uploadImg();
    }
    function GuiMail(){
        $model = $this->call_model("guiMailModel");
        $tieude = $_POST["tieude"];
        $diachigui = $_POST["diachigui"];
        $bodyconten = $_POST["bodyconten"]; 
        $url = $_POST["linkanh"];
        if($model->sendMail($tieude,$diachigui,$bodyconten,$url)){
            if(unlink($url)){
                echo true ;
            }else{
                echo false;
            }
        }

    }
}
?>