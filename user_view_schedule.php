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

    <div class="content" style="margin: 40px 30px 30px 30px; height: 400px">
        <h1>Lịch khám</h1>
        <table class="table table-striped" style="margin: 30px 20px 20px 20px;">
            <tr>
                <th>Khoa khám</th>
                <th>Ngày khám</th>
                <th>Giờ khám</th>
                <th>Triệu chứng</th>
                <th>Xác nhận</th>
            </tr>
            <?php
                include('database.php');
                $id_user = $_SESSION['id_login'];

                $sql= "SELECT * FROM dat_lich_kham where xac_nhan=TRUE and id_tai_khoan='$id_user' ORDER BY ngay_dat";
                    
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        $faculty = $row['khoa'];
                        $date = $row['ngay_dat'];
                        $time = $row['gio_dat'];
                        $symptom = $row['trieu_chung'];
                        $confirm = $row['xac_nhan'];


                        echo "<tr><td> $faculty </td>";
                        echo "<td> $date </td>";
                        echo "<td> $time </td>";
                        echo "<td> $symptom </td>";
                        if($confirm == TRUE){
                            echo "<td> Đã xác nhận </td>";
                        }
                        else{
                            echo "<td> Chưa xác nhận </td>";
                        }
                    }
                }
            ?>
        </table>
    </div>

    <?php include("common/footer.php"); ?>


</body>