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
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>

        <?php require "snippets/navbar.php";?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php
                    if ($conn->connect_error) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                    if(isset($_GET["username"])){
                        $user = $_GET["username"];
                        $aula = $_GET["aula"];
                        $data = $_GET["data"];
                        $stm = $conn->prepare("select * from info where username = ? and nomeAula = ? and data = ?");
                        $stm->bind_param("sss",$_GET['username'], $_GET['aula'], $_GET['data']);
                    }else{
                        $user = $_POST["username"];
                        $aula = $_POST["aula"];
                        $data = $_POST["data"];
                        if($_POST["messaggio"] !== ""){
                            $stm = $conn->prepare("insert into info(username, nomeAula, data, mittente, messaggio) values (?,?,?,?,?)");
                            $stm->bind_param("sssss",$_POST['username'], $_POST['aula'], $_POST['data'], $_SESSION["username"], $_POST["messaggio"]);
                            $stm->execute();
                            
                        }
                        $stm = $conn->prepare("select * from info where username = ? and nomeAula = ? and data = ?");
                        $stm->bind_param("sss",$_POST['username'], $_POST['aula'], $_POST['data']);
                    }
                    
                    if ($stm->execute()) {
                        $result = $stm->get_result();
                        while($row = $result->fetch_assoc()){
                            echo    '<div class="list-group-item message">
                                    <b><p class="list-group-item-heading">' . $row["mittente"] . '</p></b>
                                    <p class="list-group-item-text">' . $row["messaggio"] . '</p>
                                    </div>';
                        }
                    }
                ?>
                <form action="richiediInfo.php" method="post">
                <div class="form-group">
                    <label >Messaggio:</label>
                    <input type="text" class="form-control" name="messaggio">
                </div>
                <div hidden>
                      <input type="text" name="username" value="<?php echo $user; ?>">
                      <input type="text" name="aula" value="<?php echo $aula; ?>">
                      <input type="text" name="data" value="<?php echo $data; ?>">  
                </div>
                <div class="btn-group" role="group" aria-label="...">
                <button type="submit" class="btn btn-default" >Invia messaggio</button>
                </div>
                <div class="btn-group" role="group" aria-label="...">
                <button type="submit" class="btn btn-default" >Aggiorna pagina</button>
                </div>
                </form>
                
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>