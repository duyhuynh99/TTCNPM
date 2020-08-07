<?php
	session_start();
	session_destroy();
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
        function dangNhap(){
            $.ajax({
                method:"POST",
                url: "xuLyDangNhap.php",
                data: $("#login_form").serialize(),
                success: function(response){
                    if(response == 1){
                        window.location.href='index.php';
                    }
                    else{
                        alert("Tên tài khoản hoặc mật khẩu không chính xác, hãy nhập lại");
                    }
                }
            });
        }
    </script>
</head>

<body>

    <?php
        include("common/header_no_drop.php");
    ?>

    <div class="LogIn">
        <form class="form-horizontal" id="login_form">
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
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            </div>
        </div>
        </form>

    <!-- Đưa cái nút đăng nhập ra khỏi form -->
        <div class="row">
            <div class="form-group" style="margin-left: 20px">
                <div class="col-sm-offset-2 col-sm-10">
                <button onclick="dangNhap()" class="btn btn-default">Đăng nhập</button>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <a href="dangKy.php"><button class="btn btn-default">Đăng ký</button></a>
                </div>
            </div>
        </div>
    </div>

	<?php include("common/footer.php"); ?>
</body>