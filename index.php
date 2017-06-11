<html>
<head>
    <title>E-Commerce</title>
    <link rel="stylesheet" type="text/css" href="rush.css">
    <meta charset="utf-8">
</head>
<body>
<div id="header">
    <?php
//    session_name()
    if (isset($_SESSION['logged_on_user'])){
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
<br><br>
<div class="container">
    <div id="left_pane">

    </div>
    <div id="center_pane">

    </div>
<!--    <div id="right_pane">-->
<!---->
<!--    </div>-->
</div>

</body>
</html>
