<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Home</title>
    <style>
        body{
            background-color: tomato;
        }
    </style>
</head>
<body>
    <div class="header"></div>
    <div class="container" id="formDK">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="shadow  my-5">
              <div class="p-4 p-sm-5">
                <h5 class=" text-center mb-5 fw-light fs-5">Nhập Mã Sản Phẩm Muốn Xóa</h5>
                <form>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="maspdl" placeholder="mã sản phẩm...">
                  </div>                                          
                  <div class="d-grid text-center">
                    <button class="btn btn-primary text-uppercase" type="button" id="btn_deleteProduct">Xóa</button>
                  </div>
                  <hr class="my-10">
                  <div class="quayve text-success"><a href="../" style="color: white;">QUAY VỀ</a></div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="footer"></div>
</body>
<script src="../public/js/main.js"></script>
</html>