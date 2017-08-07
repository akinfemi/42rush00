<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cart</title>
		<link rel="stylesheet" type="text/css" href="rush.css">
		<link rel="stylesheet" type="text/css" href="extra.css">
	</head>
	<body>
		<?php include("header.php") ?>
		<article class="content-wrapper">
			<h3 id="store-greet" >Welcome <?php echo ($_SESSION['logged_on_user'] == "") ? "Guest" : $_SESSION['logged_on_user']; ?>, to your Cart</h3><br>
			<div class="all-items">
			<?php
				$total = 0;
				$items = array();
				$items = $_SESSION['cart'];
				foreach ($items as $i => $item)
				{
					echo "<div class=\"item-body\">
						<img class=\"item-pic\" src=\"".$item['image_path']." \"alt=\"Computer1\">
						<div class=\"item-all\">
						<h4 class=\"item-title\">".$item['item_name']."</h4>
							<p class=\"item-des\">".$item['item_type']."</p>
						</div>
						<div class=\"item-other\">
							<p class=\"item-price\">Price: $".$item['price']."</p>
							<p class=\"item-quan\">Quantity: ".$item['quantity']."</p>" .
							'<form action="remove.php" method="get">'.
							'<input type="hidden" name="item_id" value="' . $item['itemid'] . '" />'.
							'<input type="submit" name="request" value="Remove" /></form>'.
						"</div>
					</div>";
					$total += ($item['price'] * $item['quantity']);
				}
				if ($_POST['remove'] == 1)
					$item['quantity'] -= 1;
			echo '</div>
				<div class="check-out-wrapper">' .
					'<em>Sub-Total: ' . $total . '</em><br/>' .
					'<em>Tax(7.5%): ' . $total * .075 . ' </em><br/>' .
					'<strong>Total: ' . $total * 1.075 . '</strong><br/>' .
					'<button type="button" name="Checkout">Checkout</button>' .
				'</div>' .
				'</article><div class="check-out-wrapper"><button type="button" onclick="print()">Print Invoice</button></div>';
			include("footer.php");
			?>
	</body>
</html>
