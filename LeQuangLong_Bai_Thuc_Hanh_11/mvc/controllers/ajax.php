<?php 
class ajax extends controller{
    function show(){

    }
    function showAllStudent(){
        $model = $this->call_model("homeModel");
        $model->showAllStudent();
    }
    function  addStudents(){
        $tenthisinh = $_POST["tenthisinh"];
        $ngaysinh = $_POST["ngaysinh"];
        $quequan= $_POST["quequan"];
        $tongdiem = $_POST["tongdiem"];
        $model = $this->call_model("homeModel");
        echo $model->addStudents($tenthisinh,$ngaysinh,$quequan,$tongdiem);
    }
    function deleteStudent(){
        $masv = $_POST["masv"];
        $model = $this->call_model("homeModel");
        echo $model->deleteStudent($masv);
    }

    function updateStudents(){
        $masv = $_POST["masv"];
        $tenthisinh = $_POST["tenthisinh"];
        $ngaysinh = $_POST["ngaysinh"];
        $quequan= $_POST["quequan"];
        $tongdiem = $_POST["tongdiem"];
        $model = $this->call_model("homeModel");
        echo $model->updateStudents($masv,$tenthisinh,$ngaysinh,$quequan,$tongdiem);
    }
    function showInformation(){
        $model = $this->call_model("homeModel");
        $model->selectOneStudents(2);        
    }
    function selectOneStudents(){
        $masv = $_POST["masv"];
        $model = $this->call_model("homeModel");
        if($model->selectOneStudents($masv)){
            $model->showFormInputSua($masv);
        }else{
            echo false;
        }       
    }

    function selectOneStudentsWhereTongDiem(){
        $tongdiem = $_POST["tongdiemtim"];
        $model = $this->call_model("homeModel");
        echo $model->showAllStudentWhereTongDiem($tongdiem);
    }
}
?>