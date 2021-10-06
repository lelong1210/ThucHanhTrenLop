<?php
class smarthome{
    protected $screen ;
    protected $button ;
    protected $camere ;
    function getSmartHome(){
        echo "screen : ==> ".$this->screen."<br>";
        echo "button : ==> ".$this->button."<br>";
        echo "camera : ==> ".$this->camere."<br>";
    }
    function setSmartHome($screen,$button,$camere){
        $this->screen = $screen;
        $this->button = $button;
        $this->camere = $camere ;      
    }
}
class iphone extends smarthome{
    function __construct(){
        $this->setSmartHome("tràn viền","không có","3 camera");
        $this->getSmartHome();
    }
}
class samsung extends smarthome{
    function __construct(){
        $this->setSmartHome("2 màn hình","ẩn dưới màn","2 camera");
        $this->getSmartHome();        
    }
}
/********************************************/
echo "IPHONE====<br>";
$iphone = new iphone();
echo "SAMSUNG====<br>";
$samsung = new samsung();
?>