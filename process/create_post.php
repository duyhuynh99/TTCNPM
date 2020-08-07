<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
?>

<?php       
            include('../database.php');
            
            if(!isset($_POST['title']) or !isset($_POST['content'])){
                echo "Xin hãy nhập đầy đủ các phần." ;
            }
            else{
                $id_poster = $_SESSION['id_login'];
                $title =$_POST['title'];
                $content =$_POST['content'];
                $sql = "INSERT INTO bai_dang(id_nguoi_dang,tieu_de,noi_dung,thoi_gian)
                VALUES ($id_poster,'$title','$content',CURTIME());";
                if ($conn->query($sql) == TRUE) {
                    echo "Tạo bài viết thành công";
                } else {
                    echo "Không thể Tạo bài viết";
                }

            }
            $conn->close();
?>