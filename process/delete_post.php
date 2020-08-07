<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
?>

<?php       
            include('../database.php');
            
            if(!isset($_POST['id_post'])){
                echo "Không nhận được id_post" ;
            }
            else{
                $id_post = $_POST['id_post'];
                $sql = "DELETE FROM bai_dang WHERE id='$id_post'; ";
                if ($conn->query($sql) == TRUE) {
                    echo "1";
                } else {
                    echo "Không thể xóa bài đăng";
                }

            }
            $conn->close();
?>