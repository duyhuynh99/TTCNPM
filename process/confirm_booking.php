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
                $sql1 = "SELECT* FROM dat_lich_kham WHERE id='$id_booking';";

                $result = mysqli_query($conn, $sql1);
                $row = mysqli_fetch_array($result);
                $faculty = $row['khoa'];
                $date = $row['ngay_dat'];
                $time = $row['gio_dat'];

                $sql2 = "SELECT* FROM thong_tin_tai_khoan_doctor WHERE khoa='$faculty';";
                $result = mysqli_query($conn, $sql2);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)){
                        $id_doctor = $row['id_tai_khoan'];
                        $sql3 = "SELECT* FROM dat_lich_kham WHERE id_bac_si='$id_doctor' and ngay_dat='$date' and gio_dat='$time' and xac_nhan=TRUE ;";
                        $result3 = mysqli_query($conn, $sql3);
                        if(mysqli_num_rows($result3)==0){
                            $sql = "UPDATE dat_lich_kham SET xac_nhan=TRUE, id_bac_si='$id_doctor' WHERE id='$id_booking'; ";
                            break;
                        }
                    }
                }
                if (isset($sql) and $conn->query($sql)==TRUE) {
                    echo "1";
                } else {
                    echo "Hiện không có bác trong khoa rảnh vào giờ này!";
                }
            }
            $conn->close();
?>