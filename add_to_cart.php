<?php
session_start();
?>
<?php

$items = $_SESSION['cart'];
$contents = file_get_contents("../private/items");
$uns_content = unserialize($contents);
$id = $_REQUEST['item_id'];
$skip = 0;
foreach ($items as $i => $unit)
{
	if ($unit['itemid'] == $id)
	{
		$unit['quantity'] = $unit['quantity'] + 1;
		$items[$i] = $unit;
		$_SESSION['cart'] = $items;
		header('Location: shop.php');
		$skip = 1;
		return;
	}
}
if (skip == 0)
{
	foreach ($uns_content as $j => $list)
	{
		if ($list['itemid'] == $id)
		{
			array_push($items, $list);
			$items[end(array_keys($items))]['quantity'] = 1;
			$_SESSION['cart'] = $items;
			header('Location: shop.php');
			return;
		}
	}
}
header('Location: shop.php');
?>