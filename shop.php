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
			<h3 id="store-greet" >Welcome <?php echo ($_SESSION['logged_on_user'] == "") ? "Guest" : $_SESSION['logged_on_user']; ?>, to the Shop</h3><br>
			<div class="category-picker">
				<button class="cat-btn" type="button" name="button">All</button>
				<button class="cat-btn" type="button" name="button">Computers</button>
				<button class="cat-btn" type="button" name="button">Mouse</button>
				<button class="cat-btn" type="button" name="button">Keyboard</button>
			</div>
            <div class="container_2">
            <?php
            if (file_exists("../private/items") !== FALSE){
                $contents = file_get_contents("../private/items");
                $uns_content = unserialize($contents);
                foreach ($uns_content as $i => $files){
                    echo"<div class=\"store-item store-page\"><form method='post' action='in_cart.php'><button class=\"si-btn\" type=\"button\" name=\"button\">Add to cart</button></form>".
                        "<img class='si-pic' src=" . $uns_content[$i]['image_path'] . " alt='Computer1'>".
                        "<div class=\"si-all\">".
                        "<h4 class=\"si-tittle\">".$uns_content[$i]['item_name']."</h4>".
                        "<p class=\"si-des\">Category: ".$uns_content[$i]['item_type']."</p>".
						"<p class=\"si-price\">Price: ".$uns_content[$i]['price']."</p></div></div>";
                };
            }else
                echo "<h4>No item in shop</h4>";
            ?>
		</article>
		<?php include("footer.php") ?>
	</body>
</html>
