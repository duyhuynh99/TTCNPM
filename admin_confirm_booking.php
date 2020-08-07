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
	<title>Xác nhận đặt khám</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/booking_admin.css">
    <script>
        function confirm_booking(value){
            $.ajax({
                method:"POST",
                url: "process/confirm_booking.php",
                data: {id_booking : value},
                success: function(response){
                    if(response == 1){
                        window.location = "admin_confirm_booking.php?ss=1";
                    }
                    else{
                        document.getElementById("result").innerHTML = response;
                        document.getElementById("success").innerHTML = '';
                    }
                }
            });
        }
        function cancel_booking(value){
            $.ajax({
                method:"POST",
                url: "process/delete_booking.php",
                data: {id_booking : value},
                success: function(response){
                    if(response == 1){
                        window.location = "admin_confirm_booking.php";
                    }
                    else{
                        document.getElementById("result").innerHTML = response;
                    }
                }
            });
        }
        function change_faculty(){
            faculty =  document.getElementById("faculty-selection").value;
            window.location = "admin_confirm_booking.php?faculty=" + faculty;
        }

        function search_ID(){
            faculty =  document.getElementById("faculty-selection").value;
            ID_search = document.getElementById("ID_search").value;
            $.ajax({
                method:"POST",
                url: "process/change_session_bookingConfirm.php",
                data: { ID_search : ID_search},
                success: function(response){
                }
            });
            window.location = "admin_confirm_booking.php?faculty=" + faculty;
        }
        function search_ID_user(){
            faculty =  document.getElementById("faculty-selection").value;
            ID_user_search = document.getElementById("ID_user_search").value;
            $.ajax({
                method:"POST",
                url: "process/change_session_bookingConfirm.php",
                data: { ID_user_search : ID_user_search},
                success: function(response){
                }
            });
            window.location = "admin_confirm_booking.php?faculty=" + faculty;
        }
        
        function reset(){
            $.ajax({
                method:"POST",
                url: "process/change_session_bookingConfirm.php",
                data: { },
                success: function(response){
                }
            });
            window.location = "admin_confirm_booking.php"
        }
    </script>
</head>

<body>

    <?php include("common/header.php"); ?>
    <?php 
        $faculty = 'all';
        if(isset($_GET['faculty'])){
            $faculty = $_GET['faculty'];
        }
        if(isset($_SESSION['id_search_bookingConfirm'])){
            $id_search = $_SESSION['id_search_bookingConfirm'];
        }
        if(isset($_SESSION['id_user_search_bookingConfirm'])){
            $id_user_search = $_SESSION['id_user_search_bookingConfirm'];
        }
    ?>
    
    <div class="container">
        <?php include("common/admin_nav.php"); ?>
    </div>

    <div class="information">

        <h1 style="color:#007bff;">XÁC NHẬN ĐẶT KHÁM</h1>

        <div id="result" style="color: red">
        </div>
        
        <div id="success" <?php if(!isset($_GET['ss'])){echo"style=\"display:none;\"";} ?> style="color: red">
            Xác nhận thành công !
        </div>

        <div class="row" style="margin-bottom: 30px;margin-top:20px">
            <div class="col-md-2">
                <label for="faculty-selection">Chọn khoa:</label><br/>
                <select onchange="change_faculty()" id="faculty-selection" class="custom-select">
                    <option value="all" <?php if($faculty=='all'){echo "selected";} ?>> Tất cả </option>
                    <option value="Khoa thần kinh" <?php if($faculty=='Khoa thần kinh'){echo "selected";} ?>> Khoa thần kinh </option>
                    <option value="Khoa y học cổ truyền" <?php if($faculty=='Khoa y học cổ truyền'){echo "selected";} ?>> Khoa y học cổ truyền </option>
                    <option value="Khoa sản" <?php if($faculty=='Khoa sản'){echo "selected";} ?>> Khoa sản </option>
                    <option value="Khoa nhi" <?php if($faculty=='Khoa nhi'){echo "selected";} ?>> Khoa nhi </option>
                    <option value="Khoa vật lý trị liệu" <?php if($faculty=='Khoa vật lý trị liệu'){echo "selected";} ?>> Khoa vật lý trị liệu </option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="ID_search">Tìm theo ID:</label><br/>
                <input type="text" class="form-control" id="ID_search" <?php if(isset($id_search)){echo "value=\"$id_search\"";} ?>
                    onchange="search_ID()">
            </div>

            <div class="col-md-2">
                <label for="ID_user_search">Tìm theo ID user:</label><br/>
                <input type="text" class="form-control" id="ID_user_search" <?php if(isset($id_user_search)){echo "value=\"$id_user_search\"";} ?>
                    onchange="search_ID_user()">
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-primary" onclick="reset()" style="margin-top:32px">RESET</button>
            </div>
        </div>
        
        <table class="table table-striped" id="data_table">
            <tr>
                <th>ID</th>
                <th>ID user</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Khoa khám</th>
                <th>Ngày khám</th>
                <th>Giờ khám</th>
                <th>Xác nhận</th>
                <th>Hủy</th>
            </tr>
            <?php
                if($faculty == 'all'){
                    if(isset($id_search) and $id_search!=''){
                        $sql= "SELECT * FROM dat_lich_kham where xac_nhan=FALSE AND id='$id_search'";
                    }
                    else if(isset($id_user_search) and $id_user_search!=''){
                        $sql= "SELECT * FROM dat_lich_kham where xac_nhan=FALSE AND id_tai_khoan='$id_user_search'";
                    }
                    else{
                        $sql= "SELECT * FROM dat_lich_kham where xac_nhan=FALSE ";
                    }
                }
                else{
                    if(isset($id_search) and $id_search!=''){
                        $sql= "SELECT * FROM dat_lich_kham where xac_nhan=FALSE AND id='$id_search' AND khoa='$faculty'";
                    }
                    else if(isset($id_user_search) and $id_user_search!=''){
                        $sql= "SELECT * FROM dat_lich_kham where xac_nhan=FALSE AND id_tai_khoan='$id_user_search' AND khoa='$faculty'";
                    }
                    else{
                        $sql= "SELECT * FROM dat_lich_kham where xac_nhan=FALSE AND khoa='$faculty'";
                    }
                }
                    
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        $id_booking = $row['id'];
                        $id_user = $row['id_tai_khoan'];
                        $faculty = $row['khoa'];
                        $date = $row['ngay_dat'];
                        $time = $row['gio_dat'];

                        $sql1 = "SELECT * FROM thong_tin_tai_khoan WHERE id_tai_khoan='$id_user' ";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0){
                            $row = mysqli_fetch_array($result1);
                            $user_name = $row['name'];
                            $user_sur_name = $row['sur_name'];
                        }

                        $sql1 = "SELECT * FROM tai_khoan WHERE id = '$id_user' ";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0){
                            $row = mysqli_fetch_array($result1);
                            $user_number_phone = $row['so_dien_thoai'];
                        }


                        echo "<tr> <td> $id_booking </td>";
                        echo "<td> $id_user </td>";
                        echo "<td> $user_name $user_sur_name</td>";
                        echo "<td> $user_number_phone </td>";
                        echo "<td> $faculty </td>";
                        echo "<td> $date </td>";
                        echo "<td> $time </td>";
                        echo "<td> <button onclick=\"confirm_booking($id_booking)\" class=\"btn btn-primary\" style=\"background-color:#007bff\"> Xác nhận </button> </td>";
                        echo "<td> <button onclick=\"cancel_booking($id_booking)\" class=\"btn btn-primary\" style=\"background-color:#007bff\"> Hủy </button> </td></tr>";
                    }
                }
            ?>
        </table>
    </div>

    <?php include("common/footer.php"); ?>


</body>