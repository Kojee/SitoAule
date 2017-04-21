<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: http://localhost/SitoAule/index.php");
        die();
    }
    $aula = "";
    if(isset($_GET['aula']))
    {
        $aula = $_GET["aula"];
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "utenti";

    $conn = new mysqli($servername, $username, $password, $dbname);   
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
                <form action="prenota.php" method="post">
                <div class="form-group">
                    <label >Aula</label>
                    <input type="text" class="form-control" name="nomeAula" value="<?php echo $aula;?>">
                </div>
                <div class="form-group">
                    <label >Data</label>
                    <input type="date" class="form-control" name="data">
                </div>
                <div class="form-group">
                    <label>Ora</label>
                    <input type="time" class="form-control" name="ora" id="ora">
                </div>
                <div hidden>
                <input type="text" class="form-control" name="username" value="<?php echo $_SESSION["username"];?>">
                <input type="text" class="form-control" name="nome" value="<?php echo $_SESSION["nome"];?>">
                <input type="text" class="form-control" name="cognome" value="<?php echo $_SESSION["cognome"];?>">
                <?php
                    if(isset($_GET["exact"])){
                        echo '<input type="text" class="form-control" name="exact" value="true">';
                    }
                ?>
                </div>
                <button type="submit" class="btn btn-default" >Prenota</button>
                </form>
                <div class="alert alert-danger" role="alert" id="invalidHour" hidden>L'ora selezionata non è valida</div>
                <?php
                    if ($conn->connect_error) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $stm = $conn->prepare("select nome, cognome, nomeAula, data from prenotazioni where nomeAula = ?");
                        $stm->bind_param("s", $_GET["aula"]);

                        if ($stm->execute()) {
                            $result = $stm->get_result();
                            while($row = $result->fetch_assoc()){
                                $approvata = "";
                                if($row["approvata"] === "true"){ 
                                    $approvata = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ';
                                }
                                echo    '<a href="https://localhost/SitoAule/aule/aule.php?aula=' . $row["nomeAula"] . '" class="list-group-item">
                                        <h4 class="list-group-item-heading">' . $approvata . $row["nomeAula"] . '</h4>
                                        
                                        <p class="list-group-item-text">Prenotata da ' . $row["nome"] . ' ' . $row["cognome"] .' <span class="label label-default date-label">' . $row["data"] . '</span></p>
                                        </a>';
                            }
                        }
                ?>
            </div>
            <div class="col-md-4"></div>
        </div>
        <script>
            function validateForm() {
                if(document.getElementById("ora").value > 0 && document.getElementById("ora").value < 7){
                    return true;
                }
                else{
                    document.getElementById("invalidHour").style.display = "block";
                    return false;
                }
            }
        </script>
    </body>
</html>