<?php
    session_start();
    if(!isset($_SESSION["admin"])){
        header("Location: http://localhost/SitoAule/index.php");
        die();
    }

    ?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/custom.css">
    </head>
    <body>

        <?php require "../snippets/navbar.php";?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="list-group">
                <a class="buttonWrapper" href="http://localhost/SitoAule/admin/inserisciForm.php"><button type="button" class="list-group-item">Inserisci Aula</button></a>
                <a class="buttonWrapper" href="http://localhost/SitoAule/admin/rimuoviForm.php"><button type="button" class="list-group-item">Rimuovi Aula</button></a>
                <a class="buttonWrapper" href="http://localhost/SitoAule/admin/modificaForm.php"><button type="button" class="list-group-item">Modifica Aula</button></a>
                <a class="buttonWrapper" href="http://localhost/SitoAule/admin/listaUtenti.php"><button type="button" class="list-group-item">Visiona Utenti</button></a>
                <a class="buttonWrapper" href="http://localhost/SitoAule/admin/listaPrenotazioni.php"><button type="button" class="list-group-item">Visiona Prenotazioni</button></a>

                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        
    </body>
</html>