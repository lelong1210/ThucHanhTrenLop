<?php
class candidate{
    protected $masv ;
    protected $tensv ;
    protected $ngaysinh ;
    protected $diemtoan ;
    protected $diemly ;
    protected $diemhoa ;
    function getMasv(){
        return $this->masv;
    }
    function setMaSv($masv){
        $this->masv = $masv;
    }
    function getTensv(){
        return $this->tensv;
    }
    function setTensv($tensv){
        $this->tensv = $tensv ;
    }
    function getNgaySinh(){
        return $this->ngaysinh ;
    }
    function setNgaySinh($ngaysinh){
        $this->ngaysinh = $ngaysinh ;
    }
    function getDiemToan(){
        return $this->diemtoan ;
    }
    function setDiemToan($diemtoan){
        $this->diemtoan = $diemtoan ;
    }
    function getDiemLy(){
        return $this->diemly ;
    }
    function setDiemLy($diemly){
        $this->diemly = $diemly ;
    }
    function getDiemHoa(){
        return $this->diemhoa ;
    }
    function setDiemHoa($diemhoa){
        $this->diemhoa = $diemhoa ;
    }
    function getTongDiem(){
        // echo "heloe";
        return ($this->diemtoan + $this->diemhoa + $this->diemly);
    }
}
class testcandidate extends candidate{
    function inputSinhVien($tensv,$masv,$ngaysinh,$diemtoan,$diemly,$diemhoa){
        $this->setTensv($tensv);
        $this->setMaSv($masv);
        $this->setNgaySinh($ngaysinh);
        $this->setDiemHoa($diemhoa);
        $this->setDiemToan($diemtoan);
        $this->setDiemLy($diemly);
    }
    function outputSinhVien(){
        return array($this->getMasv(),$this->getTensv(),$this->getNgaySinh(),$this->getTongDiem());
    }
}
/*********************************************************************/
?>
