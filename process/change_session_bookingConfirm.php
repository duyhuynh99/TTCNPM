<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
?>

<?php
    include("../database.php");

    if(isset($_POST['ID_search'])){
        $_SESSION['id_search_bookingConfirm'] = $_POST['ID_search'];
        $_SESSION['id_user_search_bookingConfirm'] = '';
    }
    else{
        $_SESSION['id_search_bookingConfirm'] = '';
        if(isset($_POST['ID_user_search'])){
            $_SESSION['id_user_search_bookingConfirm'] = $_POST['ID_user_search'];
        }
        else{
            $_SESSION['id_user_search_bookingConfirm'] = '';
        }
    }
?>