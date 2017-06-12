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
            <div id="header">
                <?php
                if (($_SESSION['logged_on_user']) !== ""){
                    echo "Welcome, ".$_SESSION['logged_on_user'];
                    echo "<div id='logout'><a href='logout.php'>Logout</a></div>";
                }
                else{
                    echo "
                <form method=\"post\" action=\"login.php\">
    Username: <input name=\"login\" type=\"text\">
    Password: <input name=\"passwd\" type=\"password\">
    <input type=\"submit\" name=\"submit\" value=\"OK\">
    <a class=\"c_links\" href=\"create.html\">Create New User</a>
    <a class=\"c_links\" href=\"modify.html\">Modify Password</a>
    </form>           
            ";
                }
                ?>
            </div>
            <h3 id="store-greet" >Welcome, <?php echo ($_SESSION['logged_on_user'] == "") ? "Guest" : $_SESSION['logged_on_user']; ?></h3><br>
            <div class="my-slides">
                <img class="slide" src="imgs/Computer1.png" alt="Computer1">
                <img class="slide" src="imgs/Computer2.png" alt="Computer2">
                <img class="slide" src="imgs/Computer3.png" alt="Computer3">
                <img class="slide" src="imgs/Computer4.png" alt="Computer4">
                <button class="slide-btn btn-display-left" onclick="plusSlides(-1)">&#10094;</button>
                <button class="slide-btn in-index" onclick="curSlide(1)">1</button>
                <button class="slide-btn in-index" onclick="curSlide(2)">2</button>
                <button class="slide-btn in-index" onclick="curSlide(3)">3</button>
                <button class="slide-btn btn-display-right" onclick="plusSlides(+1)">&#10095;</button>
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
            if (n > x.length - 1) {slideIndex = 1};
            if (n < 1) {slideIndex = x.length - 1};
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
