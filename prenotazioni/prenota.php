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
    $date = $_POST["data"];
    $time = $_POST["ora"];
    $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
    echo $combinedDT;
    
    $stm = $conn->prepare("insert into prenotazioni (username, nome, cognome, nomeAula, data) values (?,?,?,?,?)");
    $stm->bind_param("sssss", $_POST["username"], $_POST["nome"],$_POST["cognome"],$_POST["nomeAula"], $combinedDT);

    if ($stm->execute()) {
        echo "successo";
    }
?>