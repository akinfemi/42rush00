<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8">
        <title>Shop</title>
        <link rel="stylesheet" type="text/css" href="rush.css">
		<link rel="stylesheet" type="text/css" href="extra.css">
	</head>
	<body>
		<?php include("header.php") ?>
		<article class="content-wrapper">
			<h3 id="store-greet" >Welcome <?php echo ($_SESSION['logged_on_usr'] == "") ? "Guest" : $_SESSION['logged_on_usr']; ?>, to the Shop</h3><br>
			<div class="category-picker">
				<button class="cat-btn" type="button" name="button">All</button>
				<button class="cat-btn" type="button" name="button">Computers</button>
				<button class="cat-btn" type="button" name="button">Mouse</button>
				<button class="cat-btn" type="button" name="button">Keyboard</button>
			</div>
			<div class="store-items">
				<div class="store-item store-page">
					<button class="si-btn" type="button" name="button">Add to cart</button>
					<img class="si-pic" src="images/Computer1.png" alt="Computer1">
					<div class="si-all">
						<h4 class="si-tittle">This is a Tittle</h4>
						<p class="si-des">This is a description</p>
						<p class="si-price">Price: $$$$$</p>
					</div>
				</div>
			</div>
		</article>
		<?php include("footer.php") ?>
	</body>
</html>
