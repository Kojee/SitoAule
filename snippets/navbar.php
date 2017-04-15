<?php   echo    '<nav class="navbar navbar-inverse navbar-static-top">
                <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Sito Aule</a>
                </div>
                <ul class="nav navbar-nav">
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">';
                    
                if(isset($_SESSION["username"])){
                    echo '<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Benvenuto ' . $_SESSION["username"] . ' </a></li>';
                    echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>';
                }else{
                    echo '<li><a href="signupForm.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                    echo '<li><a href="loginForm.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                }
                    
        echo    '</ul>
                </div>
                </nav>';
        ?>