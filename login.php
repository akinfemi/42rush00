<?php
session_start();
include ("auth.php");
if ($_POST['login'] !== "" && $_POST['passwd'] !== ""){
    if (auth($_POST['login'], $_POST['passwd']) !== false){
        $_SESSION['logged_on_user'] = $_POST['login'];
        $_SESSION['cart'] = array();
        if ($_SESSION['logged_on_user'] == 'admin')
            header('Location: admin.html');
        else {
            header('Location: welcome.php');
            echo "OK\n";
            exit();
        }
    }else{
        header('Location: welcome.php');
        echo "ERROR\n";
        exit();
    }
}else {
    $_SESSION['logged_on_user'] = "";
    header('Location: welcome.php');
    echo "ERROR\n";
    exit();
}
?>