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
	<title>Xem lịch khám</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <?php include("common/header.php"); ?>

    <div class="content" style="margin: 80px 30px 30px 30px; height: 400px">
        
        <table class="table table-striped" style="padding: 10px 10px 10px 10px;">
            <tr>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Ngày khám</th>
                <th>Giờ khám</th>
                <th>Triệu chứng</th>
            </tr>
            <?php
                include('database.php');
                $id_doctor = $_SESSION['id_login'];

                $sql= "SELECT * FROM dat_lich_kham where xac_nhan=TRUE and id_bac_si='$id_doctor' ORDER BY ngay_dat";
                    
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        $id_booking = $row['id'];
                        $id_user = $row['id_tai_khoan'];
                        $date = $row['ngay_dat'];
                        $time = $row['gio_dat'];
                        $symptom = $row['trieu_chung'];

                        $sql1 = "SELECT * FROM thong_tin_tai_khoan WHERE id_tai_khoan='$id_user' ";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0){
                            $row = mysqli_fetch_array($result1);
                            $user_name = $row['name'];
                            $user_surname = $row['sur_name'];
                        }

                        $sql1 = "SELECT * FROM tai_khoan WHERE id = '$id_user' ";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0){
                            $row = mysqli_fetch_array($result1);
                            $user_number_phone = $row['so_dien_thoai'];
                        }

                        echo "<td> $user_name $user_surname</td>";
                        echo "<td> $user_number_phone </td>";
                        echo "<td> $date </td>";
                        echo "<td> $time </td>";
                        echo "<td> $symptom </td></tr>";
                    }
                }
            ?>
        </table>
    </div>

    <?php include("common/footer.php"); ?>


</body>