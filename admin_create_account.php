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
	<title>Tạo tài khoản bác sĩ</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/account_admin.css">
    <script>
        function register(){
            $.ajax({
                method:"POST",
                url: "process/create_doctor_acc.php",
                data: $("#register-form").serialize(),
                success: function(response){
                        document.getElementById("result").innerHTML = response
                }
            });
        }
    </script>
</head>

<body>

    <?php include("common/header.php"); ?>
    
    <div class="container">
        <?php include("common/admin_nav.php"); ?>
    </div>

    <h1 class="title">TẠO TÀI KHOẢN BÁC SĨ</h1> 

    <div class="create">   

        <form class="form-horizontal" id="register-form">
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
            <div id="result" style="color:red;">
                
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button onclick="register()" class="btn btn-success">Tạo</button>
                <a href="admin.php"><button class="btn btn-success" style="margin-left:20px">Trở lại</button></a>
            </div>
        </div>
        
    </div>

    <?php include("common/footer.php"); ?>


</body>