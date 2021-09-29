<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/css/styleLR.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Login</title>
</head>

<body>
  <div class="background"></div>
  <div class="container w3-display-middle" id="formDK">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="shadow  my-5">
          <div class="p-4 p-sm-5">
            <h5 class=" text-center mb-5 fw-light fs-5">Đăng Nhập</h5>
            <form>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="usernamelg" placeholder="Tên Đăng Nhập...">
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="passwordlg" placeholder="Nhập Mật Khẩu...">
              </div>
              <div class="d-grid text-center">
                <button class="btn btn-primary text-uppercase" type="button" id="btn_DN">Đăng Nhập</button>
              </div>
              <hr class="my-10">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="./public/js/main.js"></script>

</html>