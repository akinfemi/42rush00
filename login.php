<?php
session_start();
include ("auth.php");
if ($_POST['login'] !== "" && $_POST['passwd'] !== "")
{
    $aut = auth($_POST['login'], $_POST['passwd']);
    if ($aut >= 0)
    {
        $_SESSION['logged_on_user'] = $_POST['login'];
        $_SESSION['user_is_admin'] = $aut;
        $_SESSION['cart'] = array();
        header('Location: welcome.php');
        echo "OK\n";
        exit();
    }
    else
    {
        header('Location: welcome.php');
        echo "ERROR\n";
        exit();
    }
}
else
{
    $_SESSION['logged_on_user'] = "";
    header('Location: welcome.php');
    echo "ERROR\n";
    exit();
}
?>