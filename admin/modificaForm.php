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
                <form action="modificaForm.php" method="get">
                <div class="form-group">
                    <label >Aula:</label>
                    <input type="text" class="form-control" name="nomeAula">
                </div>
                <button type="submit" class="btn btn-default">Cerca aule</button>
                </form>
                <?php
                if(isset($_GET["nomeAula"])){
                        if ($conn->connect_error) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $stm = $conn->prepare("select nome, info, tags from aule where nome like (?)");
                        $param = '%' . $_GET["nomeAula"] . '%';
                        $stm->bind_param("s", $param);

                        if ($stm->execute()) {
                            $result = $stm->get_result();
                            while($row = $result->fetch_assoc()){
                                echo    '<a href="https://localhost/SitoAule/admin/modificaAula.php?aula=' . $row["nome"] . '&info=' . $row["info"] . '&tags=' . $row["tags"] . '" class="list-group-item">
                                        <h4 class="list-group-item-heading">' . $row["nome"] . '</h4>
                                        
                                        <p class="list-group-item-text">' . $row["info"] . '</p>
                                        <p class="list-group-item-text">Tags: ' . $row["tags"] . '</p>
                                        </a>';
                            }
                        }
                }
                    
                ?>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>