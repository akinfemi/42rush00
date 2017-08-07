<?php
session_start();
?>
<?php

$items = $_SESSION['cart'];
$id = $_REQUEST['item_id'];
foreach ($items as $i => $unit)
{
	if ($unit['itemid'] == $id)
	{
		$unit['quantity'] -= 1;
		if ($unit['quantity'] == 0)
		{
			array_splice($items, $i, 1);
		}
		else
			$items[$i] = $unit;
		$_SESSION['cart'] = $items;
		header('Location: cart.php');
		return;
	}
}

?>