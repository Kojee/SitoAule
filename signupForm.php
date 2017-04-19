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

<?php require "/snippets/navbar.php";?>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <?php
            if(isset($_SESSION["username"])){
                echo    '<div class="page-header">
                        <h1>Sei già registrato <small> Effettua prima il logout per creare un nuovo utente </small></h1>
                        </div>';
            }else{
                echo    '<form action="signup.php" method="post">
                        <div class="form-group">
                        <label>Username:</label><br>
                        <input type="text" class="form-control" name="username" placeholder="Username"><br>
                        </div>
                        <div class="form-group">
                        <label>Nome:</label><br>
                        <input type="text" class="form-control" name="nome" placeholder="Nome"><br>
                        </div>
                        <div class="form-group">
                        <label>Cognome:</label><br>
                        <input type="text" class="form-control" name="cognome" placeholder="Cognome"><br>
                        </div>
                        <div class="form-group">
                        <label>Password:</label><br>
                        <input type="password" class="form-control" name="password" id="pass"><br>
                        </div>
                        <div class="form-group">
                        <label>Conferma password:</label><br>
                        <input type="password" class="form-control" name="passwordCheck" id="passCheck"><br>
                        </div>
                        <input type="submit" class="btn btn-default" value="Registrati" onclick="return validateForm()"><br>
                        <label id="info"></label>
                        
                        </form>';
            }
        ?>

    </div>
    <div class="col-md-4"></div>
</div>


<script>
    function validateForm() {
        if(document.getElementById("pass").value.localeCompare(document.getElementById("passCheck").value) === 0){
            return true;
        }
        else{
            document.getElementById("info").innerHTML = "Le password sono diverse";
            return false;
        }
    }
</script>
</body>
</html>