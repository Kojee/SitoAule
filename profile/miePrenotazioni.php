<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: http://localhost/SitoAule/index.php");
        die();
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
                <?php
                    if ($conn->connect_error) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $stm = $conn->prepare("select * from prenotazioni where username = ?");
                        $stm->bind_param("s", $_SESSION["username"]);
                        $stm = $conn->prepare("select * from prenotazioni p inner join utenti u on p.username=u.username ");
                        

                        if ($stm->execute()) {
                            $result = $stm->get_result();
                            while($row = $result->fetch_assoc()){
                                $approvata = "";
                                if($row["approvata"] === "true"){ 
                                    $approvata = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ';
                                }
                                echo    '<div class="list-group-item">
                                         
                                        <h4 class="list-group-item-heading">' . $approvata . $row["nomeAula"] . '</h4>
                                        <p class="list-group-item-text">Username:' . $row["username"] . '</p>
                                        <p class="list-group-item-text">Nome: ' . $row["nome"] . '</p>
                                        <p class="list-group-item-text">Cognome:' . $row["cognome"] .'</p>
                                        <p class="list-group-item-text">Data:' . $row["data"] . '</p>
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="https://localhost/SitoAule/richiediInfo.php?username=' . $row["username"] . '&aula=' . $row["nomeAula"] . '&data=' . $row["data"] . '"><button type="button" class="btn btn-default">Richiedi informazioni</button></a>
                                        </div>
                                        </div>';
                            }
                        }
                ?>
            </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>