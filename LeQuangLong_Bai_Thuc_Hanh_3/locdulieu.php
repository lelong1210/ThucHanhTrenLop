<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitInsert'])) {
        $masv = $_POST["msv"];
        $tensv = $_POST["tsv"];
        $quequan = $_POST["qq"];
        $ngaysinh = $_POST["ns"];
    } 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitUpdate'])) {
        $masv_up = $_POST["msvup"];
        $quequan_up = $_POST["qqup"];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitDelete'])) {
        $masv_delete = $_POST["msvdelete"];
    }  
?>