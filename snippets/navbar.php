<?php   
                    
                if(isset($_SESSION["username"])){
                    echo    '<nav class="navbar navbar-inverse navbar-static-top">
                            <div class="container-fluid">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="http://localhost/SitoAule/index.php">Sito Aule</a>
                            </div>
                            <ul class="nav navbar-nav">
                            <li><a href="http://localhost/SitoAule/aule/aule.php">Aule</a></li>
                            <li><a href="#">Prenota</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">';
                    echo    '<li><a href="http://localhost/SitoAule/profile/profile.php"><span class="glyphicon glyphicon-user"></span> Benvenuto ' . $_SESSION["username"] . ' </a></li>';
                    echo    '<li><a href="http://localhost/SitoAule/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>';
                    echo    '</ul>
                            </div>
                            </nav>';
                }else{
                    echo    '<nav class="navbar navbar-inverse navbar-static-top">
                            <div class="container-fluid">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="http://localhost/SitoAule/index.php">Sito Aule</a>
                            </div>
                            <ul class="nav navbar-nav">
                            <li><a href="#">Aule</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">';
                    echo    '<li><a href="http://localhost/SitoAule/signupForm.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                    echo    '<li><a href="http://localhost/SitoAule/loginForm.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                    echo    '</ul>
                            </div>
                            </nav>';
                }
                    
        
        ?>