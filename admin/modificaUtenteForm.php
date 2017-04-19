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
                <form action="modificaUtente.php" method="post">
                    <div class="form-group">
                    <label >Lascia vuoto per non modificare il valore attuale:</label>
                    </div>
                    <div class="form-group">
                    <label >Nuovo Username:</label>
                    <input type="text" class="form-control" name="nuovoUsername">
                    </div>
                    <div class="form-group">
                    <label >Nuovo Nome:</label>
                    <input type="text" class="form-control" name="nuovoNome">
                    </div>
                    <div class="form-group">
                    <label >Nuovo Cognome:</label>
                    <input type="text" class="form-control" name="nuovoCognome">
                    </div>
                    <div class="form-group">
                    <label >Nuovo Hash:</label>
                    <input type="text" class="form-control" name="nuovoHash">
                    </div>
                    <div class="form-group">
                    <label >Nuovi Privilegi di Admin:</label>
                    <input type="text" class="form-control" name="nuovoAdmin">
                    </div>
                    <div hidden>
                        <input type="text" class="form-control" name="usernameUtente" value="<?php echo $_GET['username']; ?>">
                        <input type="text" class="form-control" name="nomeUtente" value="<?php echo $_GET['nome']; ?>">
                        <input type="text" class="form-control" name="cognomeUtente" value="<?php echo $_GET['cognome']; ?>">
                        <input type="text" class="form-control" name="hashUtente" value="<?php echo $_GET['hash']; ?>">
                        <input type="text" class="form-control" name="adminUtente" value="<?php echo $_GET['admin']; ?>">
                    </div>
                    <button type="submit" class="btn btn-default">Modifica Utente</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>