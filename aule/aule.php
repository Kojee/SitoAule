<?php
    session_start();
    
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
                <div class="list-group">
                    <?php
                        if(isset($_GET["aule"])){
                            $aule = explode(";", $_GET["aule"]);
                            $param = "";
                            foreach($aule as $aula){
                                $param = $param . '"' . mysqli_real_escape_string($conn, $aula) . '",';
                            }
                            $param = $param . '"0"';
                            
                            $query = "select nome, info from aule where nome in ({$param})";
                            $result = mysqli_query($conn, $query);
                               while($row = mysqli_fetch_assoc($result)) {
                                    
                                    echo    '<a href="https://localhost/SitoAule/prenotazioni/prenotaForm.php?aula=' . $row["nome"] . '&exact=true" class="list-group-item">
                                            <h4 class="list-group-item-heading">' . $row["nome"] . '</h4>
                                            <p class="list-group-item-text">' . $row["info"] . '</p>
                                            </a>';
                                }
                            
                        }else{
                            $query = "select nome, info from aule";
                        
                            $result = mysqli_query($conn, $query);
                               while($row = mysqli_fetch_assoc($result)) {
                                    echo    '<a href="https://localhost/SitoAule/prenotazioni/prenotaForm.php?aula=' . $row["nome"] . '&exact=true" class="list-group-item">
                                            <h4 class="list-group-item-heading">' . $row["nome"] . '</h4>
                                            <p class="list-group-item-text">' . $row["info"] . '</p>
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