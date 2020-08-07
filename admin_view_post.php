<?php
    session_start();
    include('database.php');
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
	<title>Thông tin bài đăng</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/post_admin.css">
    <script>
        function delete_post(id_post){
            $.ajax({
                method:"POST",
                url:"process/delete_post.php",
                data:{id_post : id_post},
                sucesss: function(response){
                    if(response == 1){
                        window.location="admin_view_post.php";
                    }
                    else{
                        document.getElementById(result).innerHTML = response;
                    }
                }
            });
        }
        function search_ID(){
            ID_search = document.getElementById("ID_search").value;
            $.ajax({
                method:"POST",
                url: "process/change_session_postInfo.php",
                data: { ID_search : ID_search},
                success: function(response){
                }
            });
            window.location = "admin_view_post.php";
        }

        function search_title(){
            title_search = document.getElementById("title_search").value;
            $.ajax({
                method:"POST",
                url: "process/change_session_postInfo.php",
                data: { title_search : title_search},
                success: function(response){
                }
            });
            window.location = "admin_view_post.php";
        }

        function reset(){
            $.ajax({
                method:"POST",
                url: "process/change_session_postInfo.php",
                data: { },
                success: function(response){
                }
            });
            window.location = "admin_view_post.php";
        }
    </script>
</head>

<body>

    <?php include("common/header.php"); ?>
    
    <div class="container">
        <?php include("common/admin_nav.php"); ?>
        <?php
            if(isset($_SESSION['id_search_post'])){
                $id_search = $_SESSION['id_search_post'];
            }
            if(isset($_SESSION['title_search_post'])){
                $title_search = addslashes($_SESSION['title_search_post']);
            }
            
            if(isset($id_search) and $id_search!=''){
                $sql= "SELECT * FROM bai_dang WHERE id='$id_search'";
            }
            else if(isset($title_search) and $title_search!=''){
                $sql= "SELECT * FROM bai_dang WHERE tieu_de LIKE '%$title_search%' ORDER BY thoi_gian DESC";
            }
            else{
                $sql= "SELECT * FROM bai_dang ORDER BY thoi_gian DESC";
            }
        ?>
    </div>
    
    <div class="content">
        
        <h1>THÔNG TIN BÀI ĐĂNG</h1>

        <div class="row" style="margin-bottom: 30px;margin-top:20px">

            <div class="col-md-2">
                <label for="ID_search">Tìm theo ID:</label><br/>
                <input type="text" class="form-control" id="ID_search" <?php if(isset($id_search)){echo "value=\"$id_search\"";} ?>
                    onchange="search_ID()">
            </div>

            <div class="col-md-4">
                <label for="title_search">Tìm theo Tiêu đề:</label><br/>
                <input type="text" class="form-control" <?php if(isset($title_search)){echo "value=\"$title_search\"";} ?>
                    id="title_search" onchange="search_title()">
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-primary" onclick="reset()" style="margin-top:32px">RESET</button>
            </div>
        </div>

        <div class="result">
            
        </div>

        <table class="table table-striped" id="data_table">
            <tr>
                <th>ID</th>
                <th>ID người đăng</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Thời gian</th>
                <th>Chỉnh sửa</th>
            </tr>

            <?php
                    
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        $id = $row['id'];
                        $id_nguoi_dang = $row['id_nguoi_dang'];
                        $tieu_de = $row['tieu_de'];
                        $noi_dung = $row['noi_dung'];
                        $thoi_gian = $row['thoi_gian'];

                        echo "<tr> <td> $id </td>";
                        echo " <td> $id_nguoi_dang </td>";
                        echo " <td> $tieu_de </td>";
                        echo " <td> $noi_dung </td>";
                        echo " <td> $thoi_gian </td>";
                        echo " <td> <a href=\"admin_modify_post.php?id_post=$id\">
                        <button class=\"btn btn-primary\" style=\"background-color:#007bff\"> Chọn </button> </td></tr>";
                    }
                }
            ?>
        </table>
    </div>

    <?php include("common/footer.php"); ?>


</body>