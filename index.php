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
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>

        <?php require "/snippets/navbar.php";?>
        <div class="jumbotron">
            <div class="container">
                <?php
                
                    $cookieFirstVisitName = "firstVisitSitoAule";
                    if(!isset($_COOKIE[$cookieFirstVisitName])){
                        $cookieFirstVisitValue = "true";
                        setcookie($cookieFirstVisitName, $cookieFirstVisitValue, time() + (86400 * 30), "/");
                        echo    '<h2> Benvenuto nel sito per la prenotazione delle aule dell\'ITIS A. Rossi </h1>
                                <p>Prima di effettuare qualsiasi prenotazione per un\'aula, registrati: </p>
                                <p><a class="btn btn-primary btn-lg" href="http://localhost/SitoAule/signupForm.php" role="button">Registrati</a></p>
                                <p>Se sei già registrato, effettua l\'accesso: </p>
                                <p><a class="btn btn-primary btn-lg" href="http://localhost/SitoAule/loginForm.php" role="button">Accedi</a></p>';
                    }else{
                        if(strcmp($_COOKIE[$cookieFirstVisitName], "true") == 0){
                            $cookieFirstVisitValue = "true";
                            setcookie($cookieFirstVisitName, $cookieFirstVisitValue, time() + (86400 * 30), "/");
                            echo    '<h2> Benvenuto nel sito per la prenotazione delle aule dell\'ITIS A. Rossi </h1>
                                    <p>Prima di effettuare qualsiasi prenotazione per un\'aula, registrati: </p>
                                    <p><a class="btn btn-primary btn-lg" href="http://localhost/SitoAule/signupForm.php" role="button">Registrati</a></p>
                                    <p>Se sei già registrato, effettua l\'accesso: </p>
                                    <p><a class="btn btn-primary btn-lg" href="http://localhost/SitoAule/loginForm.php" role="button">Accedi</a></p>';
                        }else{
                            $cookieFirstVisitValue = "false";
                            setcookie($cookieFirstVisitName, $cookieFirstVisitValue, time() + (86400 * 30), "/");
                            echo    '<h2> Benvenuto nel sito per la prenotazione delle aule dell\'ITIS A. Rossi </h1>';
                        }
                        
                    }
                ?>
                
            </div>
        </div>
    </body>
</html>
