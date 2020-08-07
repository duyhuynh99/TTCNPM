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
        function modify_post(id_post){
            $.ajax({
                method:"POST",
                url: "process/modify_post.php",
                data: { id_post : id_post,
                        title : document.getElementById("title-input").value,
                        content : document.getElementById("content-input").value,
                },
                success: function(response){
                    if(response == 1){
                        document.getElementById("result").innerHTML = "Chỉnh sửa đã được lưu thành công!";
                    }
                    else{
                        document.getElementById("result").innerHTML = response;
                    }
                }
            });
        }
        function delete_post(value){
            $.ajax({
                method:"POST",
                url: "process/delete_post.php",
                data: {id_post : value},
                success: function(response){
                    if(response == 1){
                        window.location = "admin_view_post.php";
                    }
                    else{
                        document.getElementById("result").innerHTML = response;
                    }
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
    
    <h1 class="title">CHỈNH SỬA BÀI ĐĂNG</h1>

    <?php 
        include("database.php");
        $id_post = $_GET["id_post"];

        $sql = "SELECT * FROM bai_dang WHERE id = '$id_post'" ;
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $title = $row['tieu_de'];
                $content = $row['noi_dung'];
            }
        }
    ?>


    <div class="content">
        <form class="form-horizontal" id="modify-form">
            <div class="form-group">
                <label class="control-label col-sm-2" for="title-input">Tiêu đề:</label>
                <input type="text" name="title" id="title-input" class="form-control" <?php echo "value=\"$title\""; ?> >
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="content-input">Nội dung:</label>
                <textarea name="content" class="form-control" id="content-input" rows="7"><?php echo "$content"; ?></textarea>
            </div>
        </form>
        <div class="form-group">
            <div id="result" style="color:red;">
                    
            </div>
        </div>
        
        <div class="form-group">
            <button class="btn btn-success" onclick=<?php echo "\"modify_post($id_post)\""; ?> class="btn btn-default">Lưu</button>
            <button class="btn btn-success" onclick=<?php echo "\"delete_post($id_post)\""; ?> class="btn btn-default" style="margin-left:20px">Xóa</button>
        </div>

    </div>

    <?php include("common/footer.php"); ?>


</body>