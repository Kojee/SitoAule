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
    if ($conn->connect_error) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $stm = $conn->prepare("delete from prenotazioni where username = ? and nomeAula= ? and data = ?");
    $stm->bind_param("sss", $_GET["username"], $_GET["aula"], $_GET["data"]);


    if ($stm->execute()) {
        header("Location: http://localhost/SitoAule/results/successo.php");
    }else{
        header("Location: http://localhost/SitoAule/results/azioneFallita.php");
    }

    mysqli_close($conn);
    die();
?>