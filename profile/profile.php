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

    if ($conn->connect_error) {
        die("Connection failed: " . mysqli_connect_error());
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
            <div class="col-md-2">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                           <?php
                    $stm = $conn->prepare("select nomeAula, data from prenotazioni where username = ?");
                    $stm->bind_param("s", $_SESSION["username"]);
                    if ($stm->execute()) {
                        $result = $stm->get_result();
                        echo '<h4>Prenotazioni attive: </h4>';
                        while($row = $result->fetch_assoc()){
                            $approvata = "";
                            if(isset($row["approvata"])){ 
                                $approvata = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ';
                            }
                            echo    '<a href="https://localhost/SitoAule/profile/miePrenotazioni.php?nomeAula=' . $row["nomeAula"] . '&data=' . $row["data"] . '" class="list-group-item">
                                    <p class="list-group-item-text">' . $approvata . $row["nomeAula"] . ' ' . ' <span class="label label-default date-label">' . $row["data"] . '</span></p>
                                    </a>';
                        }
                    }
                ?>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>