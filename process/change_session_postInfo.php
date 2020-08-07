<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
?>

<?php
    include("../database.php");

    if(isset($_POST['ID_search'])){
        $_SESSION['id_search_post'] = $_POST['ID_search'];
        $_SESSION['title_search_post'] = '';
    }
    else{
        $_SESSION['id_search_post'] = '';
        
        if(isset($_POST['title_search'])){
            $_SESSION['title_search_post'] = $_POST['title_search'];
        }
        else{   
            $_SESSION['title_search_post'] = '';
        }
    }
?>