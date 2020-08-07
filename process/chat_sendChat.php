<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
?>

<?php
    include("../database.php");

    $idLogin =$_SESSION['id_login'];
    $loai = $_POST['loai'];
    if($_POST['noi_dung'] != ''){
        $noiDung = $_POST['noi_dung'];
        $sql = "INSERT INTO chat (id_user,noi_dung,loai) VALUES ('$idLogin','$noiDung','$loai')";
        $conn->query($sql);
    }
    $conn->close();
            
?>