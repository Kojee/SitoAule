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
                <form action="modifica.php" method="post">
                    <div class="form-group">
                    <label >Lascia vuoto per non modificare il valore attuale:</label>
                    </div>
                    <div class="form-group">
                    <label >Nuovo nome:</label>
                    <input type="text" class="form-control" name="nuovoNome">
                    </div>
                    <div class="form-group">
                    <label >Nuove informazioni:</label>
                    <input type="text" class="form-control" name="nuovoInfo">
                    </div>
                    <div class="form-group">
                    <label >Nuovi tags (separati da una virgola):</label>
                    <input type="text" class="form-control" name="nuovoTags">
                    </div>
                    <div hidden>
                        <input type="text" class="form-control" name="nomeAula" value="<?php echo $_GET['aula']; ?>">
                        <input type="text" class="form-control" name="infoAula" value="<?php echo $_GET['info']; ?>">
                        <input type="text" class="form-control" name="tagsAula" value="<?php echo $_GET['tags']; ?>">
                    </div>
                    <button type="submit" class="btn btn-default">Modifica aula</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>