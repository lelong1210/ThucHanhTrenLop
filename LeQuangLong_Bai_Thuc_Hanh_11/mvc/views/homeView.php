<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="row">
        <div class="content text-center col-sm-6" id="content">
            <div class="con" id="con">
                <?php
                    $data["model"]->showAllStudent();
                ?>
            </div>
            <!-- <div class="text-center" style="margin-top: 5%;margin-left: 5%;" > -->
            <button id="reLoad">Tải Lại</button>
            <button id="An">Ẩn</button>
            <button id="Hien">Hiện</button>
            <button id="showinputThem">Thêm</button>
            <button id="showinputXoa">Xóa</button>
            <button id="showinputSua">Sửa</button>
            <button id="showinputTimKiem">Tìm Kiếm</button>
            <!-- <button id="test">TEST</button> -->
            <!-- </div> -->
        </div>
        <div class="inputSV col-sm-6">
            <div class="" id="inputSV">
                <?php
                    // $data["model"]->showAllStudent();
                    $data["model"]->showFormInput();
                ?>
            </div> 
            <div class="" id="inputXoa">
                <?php
                    // $data["model"]->showAllStudent();
                    $data["model"]->showFormInputXoa();
                ?>
            </div>    
            <div class="" id="inputSua">
                <?php
                    // $data["model"]->showAllStudent();
                    $data["model"]->showFormInputSuaWhere();
                ?>
            </div>    
            <div class="" id="formSua"></div>      
            <div class="" id="inputTimKiem">
                <?php
                    // $data["model"]->showAllStudent();
                    $data["model"]->showFormInputTimKiem();
                ?>
            </div>       
        </div>
    </div>

    <script src="./public/js/jquery.min.js"></script>
    <script src="./public/js/main.js"></script>
</body>

</html>