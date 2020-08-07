<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<title>Trang chủ</title>
    <link rel="stylesheet" href="./css/index.css">
    <script>
        function dangKy(){
            $.ajax({
                method:"POST",
                url: "xuLyDangKy.php",
                data: $("#register_form").serialize(),
                success: function(response){
                    if(response == 1){
                        alert("Đã đăng ký thành công, hãy đăng nhập")
                        window.location.href='login.php';
                    }
                    else{
                        alert(response)
                    }
                }
            });
        }
    </script>
</head>

<body>
	<?php include("common/header.php"); ?>

  <div class="SignIn">
    <form class="form-horizontal" id="register_form">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Số điện thoại:</label>
        <div class="col-sm-10">
          <input type="phone" name="phone_number" class="form-control" id="phone" placeholder="Nhập số điện thoại">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Mật khẩu:</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu">
        </div>
      </div>
    </form>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button onclick="dangKy()" class="btn btn-default">Đăng Ký</button>
        </div>
    </div>
  </div>

	<?php include("common/footer.php"); ?>

</body>