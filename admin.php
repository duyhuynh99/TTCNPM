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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>

    <?php include("common/header.php"); ?>

    <div class="container">
        <?php include("common/admin_nav.php"); ?>
    </div>
    
    <div class="content">
        <div class="item">
            <h1> Quản Lý Tài Khoản </h1>
            <div class="row">
                <a href="admin_view_account.php"> Xem thông tin tài khoản </a>
                <a href="admin_create_account.php"> Tạo tài khoản bác sĩ </a>
            </div>
        </div>

        <hr/>

        <div class="item">
            <h1> Quản Lý Bài đăng </h1>
            <div class="row">
                <a href="admin_view_post.php"> Xem thông tin bài đăng </a>
                <a href="admin_create_post.php"> Thêm bài đăng </a>
            </div>
        </div>
        
        <hr/>
        
        <div class="item">
            <h1> Quản Lý Lịch đặt khám </h1>
            <div class="row">
                <a href="admin_confirm_booking.php"> Xác nhận đặt khám </a>
                <a href="admin_cancel_booking.php"> Hủy đặt khám </a>
            </div>
        </div>

        <hr/>

        <div class="item">
            <h1> Quản lí chat </h1>
            <div class="row">
                <a href="admin_reply_chat.php"> Trả lời tin nhắn </a>
            </div>
        </div>
    </div>

    <?php include("common/footer.php"); ?>


</body>