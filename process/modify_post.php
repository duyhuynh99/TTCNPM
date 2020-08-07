<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
?>

<?php       
            include('../database.php');
            
            if(!isset($_POST['id_post']) or !isset($_POST['title'])){
                echo "Không nhận được giá trị id_post" ;
            }
            else{
                $id_post = $_POST['id_post'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                $sql = "UPDATE bai_dang SET tieu_de='$title',noi_dung='$content' WHERE id='$id_post'; ";
                if ($conn->query($sql) == TRUE) {
                    echo "1";
                } else {
                    echo "Không thể lưu chỉnh sửa bài đăng";
                }

            }
            $conn->close();
?>