<?php
    session_start();
    if(!isset($_SESSION["admin"])){
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

                        $stm = $conn->prepare("select * from utenti");

                        if ($stm->execute()) {
                            $result = $stm->get_result();
                            while($row = $result->fetch_assoc()){
                                echo    '<a href="https://localhost/SitoAule/admin/modificaUtenteForm.php?username='. $row["username"] . '&nome=' . $row["nome"] . '&cognome=' . $row["cognome"] . '&hash=' . $row["passwordHash"] . '&admin=' . $row["admin"] . '" class="list-group-item">
                                         
                                        <h4 class="list-group-item-heading">' . $row["username"] . '</h4>
                                        
                                        <p class="list-group-item-text">Nome: ' . $row["nome"] . '</p>
                                        <p class="list-group-item-text">Cognome:' . $row["cognome"] .'</p>
                                        <p class="list-group-item-text">Hash Password:' . $row["passwordHash"] . '</p>
                                        <p class="list-group-item-text">Privilegi di admin:' . $row["admin"] . '</p>
                                        </a>';
                            }
                        }
                ?>
            </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>