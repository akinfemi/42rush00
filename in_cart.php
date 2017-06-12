<?php session_start(); ?>
<?php
$items = $_SESSION['cart'];
array_push($items, $_POST['itemid']);
$_SESSION['cart'] = $items;
?>