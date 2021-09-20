<?php
class app{
    protected $controller = "home";
    protected $action = "show" ;
    protected $params = [];
    function __construct(){
        if( isset($_GET["url"]) ){
           $arr = $this->UrlProgress();
            if( isset($arr[0]) ){
                if( file_exists("./mvc/controllers/".$arr[0].".php") ){
                    $this->controller = $arr[0];
                }
            }
            unset($arr[0]);
            require_once "./mvc/controllers/".$this->controller.".php";
            $this->controller = new $this->controller;

            if( isset($arr[1]) ){
                if( method_exists($this->controller,$arr[1]) ){
                    $this->action = $arr[1];
                }
            }
            unset($arr[1]);
            if( isset($arr[2]) ){
                $this->params = array_values($arr);
                echo "action => ".$this->action ;
                call_user_func_array(array($this->controller,$this->action),$this->params);
            }else{
                call_user_func(array($this->controller,$this->action));
            }
        }else{
            require_once "./mvc/controllers/".$this->controller.".php";
            $this->controller = new $this->controller;
            call_user_func(array($this->controller,$this->action));
        }
    }
    function UrlProgress(){
        return explode("/",trim($_GET["url"],"/"));
    }
}
?>