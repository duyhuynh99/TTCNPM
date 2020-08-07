<?php
    session_start();
    include("../database.php");

    $idUser = '';
    if(isset($_SESSION['id_rep'])){
        $idUser = $_SESSION['id_rep'];
        $sql = "SELECT * FROM chat WHERE id_user=$idUser";
        $sql1 = "SELECT * FROM thong_tin_tai_khoan WHERE id_tai_khoan='$idUser'";
    
        $result = mysqli_query($conn,$sql);
        $result1 = mysqli_query($conn,$sql1);
        $row1 = $result1->fetch_assoc();
        $name = $row1['name'];
        $surname = $row1['sur_name'];

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $noiDung = $row['noi_dung'];
                $loai = $row['loai'];
                if($loai == 'Gửi'){
                    echo "<b>$name $surname:</b> $noiDung <br>";
                }
                else{
                    echo "<b style=\"color:green\">Admin:</b> $noiDung <br>";
                }
            }
        }
    }
    

?>