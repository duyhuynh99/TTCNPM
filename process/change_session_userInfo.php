<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
?>

<?php
    include("../database.php");

    if(isset($_POST['ID_search'])){
        $_SESSION['id_search_user'] = $_POST['ID_search'];
        $_SESSION['name_search_user'] = '';
        $_SESSION['surname_search_user'] = '';
    }
    else{
        $_SESSION['id_search_user'] = '';
        
        if(isset($_POST['name_search'])){
            $_SESSION['name_search_user'] = $_POST['name_search'];
        }
        else if(isset($_POST['surname_search'])){
            $_SESSION['surname_search_user'] = $_POST['surname_search'];
        }
        else{   
            $_SESSION['name_search_user'] = '';
            $_SESSION['surname_search_user'] = '';
        }
    }
?>