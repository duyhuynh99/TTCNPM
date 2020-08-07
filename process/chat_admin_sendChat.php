<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
?>

<?php
    include("../database.php");

    $idUser = $_SESSION['id_rep'];
    if($_POST['noi_dung'] != ''){
        $noiDung = $_POST['noi_dung'];
        $sql = "INSERT INTO chat (id_user,noi_dung,loai) VALUES ('$idUser','$noiDung','Nhận')";
        $conn->query($sql);
    }
    $conn->close();
?>