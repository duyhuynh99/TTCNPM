<?php
    session_start();

    include("../database.php");

    $idLogin = $_SESSION['id_login'];
    $sql = "SELECT * FROM chat WHERE id_user=$idLogin";
    
    $result = mysqli_query($conn,$sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $noiDung = $row['noi_dung'];
            $loai = $row['loai'];
            if($loai == 'Gửi'){
                echo "<b>Tôi:</b> $noiDung <br>";
            }
            else{
                echo "<b>Nguyễn Văn A:</b> $noiDung <br>";
            }
        }
    }
?>