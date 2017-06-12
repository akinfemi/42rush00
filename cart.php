<?php session_start(); ?>
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
			<h3 id="store-greet" >Welcome <?php echo ($_SESSION['logged_on_usr'] == "") ? "Guest" : $_SESSION['logged_on_usr']; ?>, to your Cart</h3><br>
			<div class="all-items">
				<div class="item-body">
					<img class="item-pic" src="images/Computer1.png" alt="Computer1">
					<div class="item-all">
						<h4 class="item-tittle">Tittle is Computer</h4>
						<p class="item-des">This description is a bit longer for test purposes</p>
					</div>
					<div class="item-other">
						<p class="item-price">Price: $$$$</p>
						<button type="button" class="rm-btn" name="remove"><img src="images/DeleteRed.png" alt="Remove"></button>
					</div>
				</div>
			</div>
			<div class="check-out-wrapper">
				<em>Sub-Total: $$$$</em><br/>
				<em>Tax(7.5%): $$$$ </em><br/>
				<strong>Total: $$$$</strong><br/>
				<button type="button" name="button">Checkout</button>
			</div>
		</article>
		<?php include("footer.php") ?>
	</body>
</html>
