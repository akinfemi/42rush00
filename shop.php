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
				<button class="cat-btn" type="button" name="button" onclick="curBtn(1)">All</button>
				<button class="cat-btn" type="button" name="button" onclick="curBtn(2)">Computers</button>
				<button class="cat-btn" type="button" name="button" onclick="curBtn(3)">Mouse</button>
				<button class="cat-btn" type="button" name="button" onclick="curBtn(4)">Keyboard</button>
			</div>
            <div class="container_2">
            <?php
            if (file_exists("../private/items") !== FALSE){
				$type = "All";
                $contents = file_get_contents("../private/items");
                $uns_content = unserialize($contents);
                foreach ($uns_content as $i => $files){
					if ($uns_content[$i]['item_type'] === $type || $type === "All")
					{
						echo"<div class=\"store-item store-page\"><button class=\"si-btn\" type=\"button\" name=\"button\">Add to cart</button>".
	                        "<img class='si-pic' src='images/Computer2.png' alt='Computer1'>".
	                        "<div class=\"si-all\">".
	                        "<h4 class=\"si-tittle\">".$uns_content[$i]['item_name']."</h4>".
	                        "<p class=\"si-des\">Category: ".$uns_content[$i]['item_type']."</p>".
							"<p class=\"si-price\">Price: ".$uns_content[$i]['price']."</p></div></div>";
					}
                };
            }else
                echo "<h3 class='place-holder' style='text-align:center'>No item in shop</h3>";
            ?>
		</article>
		<?php include("footer.php") ?>
	</body>
	<script type="text/javascript">
		var slideIndex = 1;
		showBtn(slideIndex);

		function curBtn(n) {
			showBtn(slideIndex = n);
		}

		function showBtn(n) {
			var btns = document.getElementsByClassName("cat-btn");
			if (n > btns.length) {slideIndex = 1};
			if (n < 1) {slideIndex = btns.length};
			for (var i = 0; i < btns.length; i++) {
				btns[i].className = btns[i].className.replace(" back-btn", "");
			}
			console.log(slideIndex);
			btns[slideIndex-1].className += " back-btn";
			console.log(btns[slideIndex-1]);
			if (slideIndex == 1)
				var type = "All";
			else if (slideIndex == 2)
				var type = "Computer";
			else if (slideIndex == 3)
				var type = "Mouse";
			else if (slideIndex == 4)
				var type = "Keyboard";
			else
				var type = "All";
		}
	</script>
</html>
