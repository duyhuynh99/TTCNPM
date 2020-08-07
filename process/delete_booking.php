<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
?>

<?php       
            include('../database.php');
            
            if(!isset($_POST['id_booking'])){
                echo "Không nhận được id_booking" ;
            }
            else{
                $id_booking = $_POST['id_booking'];
                $sql = "DELETE FROM dat_lich_kham WHERE id='$id_booking'; ";
                if ($conn->query($sql) == TRUE) {
                    echo "1";
                } else {
                    echo "Không thể xóa đặt khám";
                }

            }
            $conn->close();
?>