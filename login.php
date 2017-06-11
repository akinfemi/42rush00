<?php
session_start();
include ("auth.php");
if ($_POST['login'] !== "" && $_POST['passwd'] !== ""){
    if (auth($_POST['login'], $_POST['passwd']) !== false){
        $_SESSION['logged_on_user'] = $_POST['login'];
        header('Location: index.php');
        echo "OK\n";
        exit();
    }else{
        header('Location: index.php');
        echo "ERROR\n";
        exit();
    }
}else {
    $_SESSION['logged_on_user'] = "";
    header('Location: index.php');
    echo "ERROR\n";
    exit();
}
?>