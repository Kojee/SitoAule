<?php
    session_start();

?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Sito Aule</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="#">Page 1</a></li>
                    <li><a href="#">Page 2</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(isset($_SESSION["username"])){
                        echo '<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Benvenuto ' . $_SESSION["username"] . ' </a></li>';
                        echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>';
                    }else{
                        echo '<li><a href="signupForm.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                        echo '<li><a href="loginForm.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>
