<?php
header('Content-Type: text/html; charset=utf-8');
?>

<?php       
            include('../database.php');

            $phoneNumber =$_POST['phone_number'];
            $password =$_POST['password'];
            $error = false;
            if(strlen($phoneNumber) < 9 || strlen($phoneNumber) > 11){
                echo "Số điện thoại phải từ 9 - 11 số <br>";
                $error = true;
            }
            if((int)$phoneNumber[0] != 0 ){
                echo "Số đầu tiên phải là số 0 <br>";
                $error = true;
            }
            if (strlen($password) < 4){
                echo "Mật khẩu phải có ít nhất 4 kí tự <br>";
                $error = true;
            }
            if( !$error){
                $sql = "INSERT INTO tai_khoan(so_dien_thoai,mat_khau,loai)
                VALUES ('$phoneNumber','$password',3);";
                if ($conn->query($sql) == TRUE) {
                    echo "Đăng ký tài khoản thành công";
                } else {
                    echo "Số điện thoại này đã được đăng ký.";
                }
            }
            $conn->close();
?>