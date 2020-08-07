<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
?>

<?php

    include('database.php');
    $error = false;
    $result = '';
    $id_login1=$_SESSION['id_login'];

    if($_POST['khoa'] != '0'){
        $khoa=$_POST['khoa'];
    }
    else{
        $error = true;
        $result = $result . '- Hãy chọn khoa đặt khám! </br>';
    }

    if(isset($_POST['ngay_dat'])){
        $ngayDat = $_POST['ngay_dat'];
    }
    else{
        $error = true;
        $result = $result . '- Hãy chọn ngày đặt khám! </br>';
    }

    if($_POST['gio_dat'] != "0"){
        $gioDat = $_POST['gio_dat'];
    }
    else{
        $error = true;
        $result = $result . '- Hãy chọn giờ đặt khám! </br>';
    }

    if(isset($_POST['comment'])){
        $trieuchung = $_POST['comment'];
    }
    else{
        $error = true;
        $result = $result . '- Hãy nhập triệu chứng bệnh của bạn!';
    }
    
    if(!$error){
        $sql = "INSERT INTO dat_lich_kham(id_tai_khoan,khoa,ngay_dat,gio_dat,trieu_chung)
        VALUES ('$id_login1','$khoa','$ngayDat','$gioDat','$trieuchung');";
        if ($conn->query($sql) == TRUE) {
            echo "1";
        } else {
            echo "Không thể thêm dữ liệu vào database";
        }
    }
    else{
        echo "$result";
    }
    $conn->close();
?>