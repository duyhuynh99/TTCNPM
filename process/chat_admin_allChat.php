<?php
    session_start();
    
    include("../database.php");

    $sql = "SELECT * FROM chat GROUP BY id_user ORDER BY id;";
    $result = mysqli_query($conn,$sql);

    if($result->num_rows > 0){
        echo "<b style=\" color:blue\"> Tất cả tin nhắn </b> <br>";
        while($row = $result->fetch_assoc()){
            $idUser = $row['id_user'];
            $loai = $row['loai'];
            $noiDung = $row['noi_dung'];
            $idGui = $idNhan = 0;

            
            $sql_user = "SELECT * FROM thong_tin_tai_khoan WHERE id_tai_khoan='$idUser'";       
            $result_user = mysqli_query($conn,$sql_user);
            $row_user = $result_user->fetch_assoc();
            $name = $row_user['name'];
            $surname = $row_user['sur_name'];

            $sql1 = "SELECT * FROM chat WHERE id_user=$idUser AND loai='Gửi' ORDER BY id DESC ;";
            $result1 = mysqli_query($conn,$sql1);
            if( $result1->num_rows > 0){
                $row1 = $result1->fetch_assoc();
                $idGui = $row1['id'];
                $noiDung1 = $row1['noi_dung'];
            }

            $sql2 = "SELECT * FROM chat WHERE id_user=$idUser AND loai='Nhận' ORDER BY id DESC ;";
            $result2 = mysqli_query($conn,$sql2);
            if( $result2->num_rows > 0){
                $row2 = $result2->fetch_assoc();
                $idNhan = $row2['id'];
                $noiDung2 = $row2['noi_dung'];
            }

            
            if($idGui >= $idNhan){
                echo "
                    <div class=\"mess_send\" onclick=\"traLoiTinNhan($idUser)\" > 
                        <div class=\"name\"> $name $surname <br/></div> 
                            $noiDung1 
                    </div>";
            }
            else{
                echo "
                    <div class=\"mess_receive\" onclick=\"traLoiTinNhan($idUser)\" > 
                        <div class=\"name\"> $name $surname <br/></div>
                            $noiDung2 
                        </div>";
            }
        }
    }
?>