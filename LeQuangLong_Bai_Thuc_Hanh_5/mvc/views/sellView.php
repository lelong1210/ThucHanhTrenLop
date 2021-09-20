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

    <link rel="stylesheet" href="../public/css/style.css">
    <title>Mua Sản Phẩm</title>
</head>
<body>
    <div class="header"></div>
    <div class="content">
        <div class="container w3-display-middle" id="formCheckSell">
            <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="shadow  my-5">
                <div class="p-4 p-sm-5">
                    <h5 class=" text-center mb-5 fw-light fs-5">Mua Sản Phẩm</h5>
                    <form>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="maspSellcheck" placeholder="nhập mã hoặc tên sản phẩm cần mua...">
                    </div>                                           
                    <div class="d-grid text-center">
                        <button class="btn btn-primary text-uppercase" type="button" id="btn_SellcheckProduct">Mua Sản Phẩm</button>
                    </div>
                    <hr class="my-10">
                    <div class="quayve text-success"><a href="../" >QUAY VỀ</a></div>
                    
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>        
    </div>
    <div id="taheee" class="container"></div>
    <div id="NutThanhToan" class="NutThanhToan container text-center"><button id="thanhtoan" class="btn btn-lg btn-success">THANH TOÁN</button><div class="quayve text-success"><a href="../" >QUAY VỀ</a></div></div>
    <div class="footer"></div>
</body>
<script src="../public/js/main.js"></script>
</html>