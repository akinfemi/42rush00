<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="rush.css">
        <link rel="stylesheet" type="text/css" href="extra.css">
    </head>
    <body>
        <?php include("header.php") ?>
        <article class="content-wrapper">
            <h3 id="store-greet" >Welcome, <?php echo ($_SESSION['logged_on_usr'] == "") ? "Guest" : $_SESSION['logged_on_usr']; ?></h3><br>
            <div class="my-slides">
                <?php
                if (file_exists("../private/items") !== FALSE){
                    $contents = unserialize(file_get_contents("../private/items"));
                    $i = 0;
                    foreach ($contents as $arry) {
                        echo '<div class="store-item slide">
                                <button class="si-btn" type="button" name="button">Add to cart</button>
                                <img class="si-pic" src="images/Computer1.png" alt="'.$arry['item_name'].'">
                                <div class="si-all">
                                   <h4 class="si-tittle">'.$arry['item_name'].'</h4>
                                   <p class="si-des">'.$arry['item_type'].'</p>
                                   <p class="si-price">Price: '.$arry['price'].'</p>
                                </div>
            				</div>';
                        $i++;
                    }
                    echo '<div class="nav-slide"><button class="slide-btn btn-display-left" onclick="plusSlides(-1)">&#10094;</button>';
                    foreach (range(1, $i) as $num)
                        echo '<button class="slide-btn in-index" onclick="curSlide('.$num.')">'.$num.'</button>';
                    echo '<button class="slide-btn btn-display-right" onclick="plusSlides(+1)">&#10095;</button></div>';
                }
                else
                    echo "<h3 class='place-holder' style='text-align:center'>No items currently in stock</h3>";

                ?>
            </div>
            <div class="about-us-container">
                <h3>About us</h3>
                <ul>
                    <li>We like to code</li>
                    <li>We try to stay professional</li>
                </ul>
            </div>
        </article>
        <?php include("footer.php") ?>
    </body>
    <script type="text/javascript">
        var slideIndex = 1;
        showSlide(slideIndex);

        function plusSlides(n) {
            showSlide(slideIndex += n);
        }

        function curSlide(n) {
            showSlide(slideIndex = n);
        }

        function showSlide(n) {
            var x = document.getElementsByClassName("slide");
            var dots = document.getElementsByClassName("in-index");
            if (n > x.length) {slideIndex = 1};
            if (n < 1) {slideIndex = x.length};
            console.log(slideIndex);
            for (var i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (var i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" back-btn", "");
            }
            x[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " back-btn";
        }
    </script>
</html>
