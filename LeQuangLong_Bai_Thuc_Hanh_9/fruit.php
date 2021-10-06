<?php
    class fruit{
        protected $ten ;
        protected $mausac ;
        public function getTenMauSac(){
            echo "ten : ==> ".$this->ten."<br>";
            echo "mausac : ==> ".$this->mausac."<br>";
        }  
        public function setTenMauSac($ten,$mausac){
            $this->ten = $ten ;
            $this->mausac = $mausac;
        }    
    }
    class fruitChild extends fruit{
        public function testFruit($ten,$mausac){
            $this->setTenMauSac($ten,$mausac);
            $this->getTenMauSac();
        }
    }
    $test = new fruitChild();
    $test->testFruit("grapefruit","blue");
?>