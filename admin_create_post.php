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
	<title>Tạo bài đăng</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/post_admin.css">
    <script>
        function create_post(){
            $.ajax({
                method:"POST",
                url: "process/create_post.php",
                data: $("#create-form").serialize(),
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

    <h1 class="title">TẠO BÀI ĐĂNG</h1>
    
    <div class="content_create">
        <form class="form-horizontal" id="create-form">
            <div class="form-group">
                <label class="control-label col-sm-2" for="title">Tiêu đề:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề">
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="content">Nội dung:</label>
                <textarea name="content" class="form-control" id="content" rows="7" placeholder="Nhập nội dung"></textarea>
            </div>
        </form>
        <div class="form-group">
            <div id="result" style="color:red;">
                    
            </div>
        </div>
        
        <div class="form-group">
            <button onclick="create_post()" class="btn btn-success">Tạo</button>
            <a href="admin.php" style="margin-left:20px"><button class="btn btn-success">Trở lại</button></a>
        </div>
    </div>

    <?php include("common/footer.php"); ?>


</body>