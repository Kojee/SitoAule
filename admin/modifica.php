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

    if($_POST["nuovoNome"] === ""){
        $nuovoNome = $_POST["nomeAula"];
    }else{
        $nuovoNome = $_POST["nuovoNome"];
    }
    if($_POST["nuovoInfo"] === ""){
        $nuovoInfo = $_POST["infoAula"];
    }else{
        $nuovoInfo = $_POST["nuovoInfo"];
    }
    if($_POST["nuovoTags"] === ""){
        $nuovoTags = $_POST["tagsAula"];
    }else{
        $nuovoTags = $_POST["nuovoTags"];
    }
   
    $stm = $conn->prepare("update aule set nome = ?, info = ?, tags = ? where nome = ?");
    $stm->bind_param("ssss", $nuovoNome, $nuovoInfo, $nuovoTags, $_POST["nomeAula"]);


    if ($stm->execute()) {
        header("Location: http://localhost/SitoAule/results/successo.php");
    }else{
        header("Location: http://localhost/SitoAule/results/azioneFallita.php");
    }

    mysqli_close($conn);
    die();
?>