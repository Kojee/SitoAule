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

    if($_POST["nuovoUsername"] === ""){
        $nuovoUsername = $_POST["usernameUtente"];
    }else{
        $nuovoUsername = $_POST["nuovoUsername"];
    }
    if($_POST["nuovoNome"] === ""){
        $nuovoNome = $_POST["nomeUtente"];
    }else{
        $nuovoNome = $_POST["nuovoNome"];
    }
    if($_POST["nuovoCognome"] === ""){
        $nuovoCognome = $_POST["cognomeUtente"];
    }else{
        $nuovoCognome = $_POST["nuovoCognome"];
    }
    if($_POST["nuovoHash"] === ""){
        $nuovoHash = $_POST["hashUtente"];
    }else{
        $nuovoHash = $_POST["nuovoHash"];
    }
    if($_POST["nuovoAdmin"] === ""){
        $nuovoAdmin = $_POST["adminUtente"];
    }else{
        $nuovoAdmin = $_POST["nuovoAdmin"];
    }
    echo "update utenti set username = '" . $nuovoUsername . "', nome = '" . $nuovoNome . "', cognome = '" . $nuovoCognome . "', passwordHash= '" . $nuovoHash . "', admin = '" . $nuovoAdmin . "' where username = '" . $_POST["usernameUtente"] . "'";
    $stm = $conn->prepare("update utenti set username = ?, nome = ?, cognome = ?, passwordHash = ?, admin = ? where username = ?");
    $stm->bind_param("ssssss", $nuovoUsername, $nuovoNome, $nuovoCognome, $nuovoHash, $nuovoAdmin, $_POST["usernameUtente"]);


    if ($stm->execute()) {
        header("Location: http://localhost/SitoAule/results/successo.php");
    }else{
        header("Location: http://localhost/SitoAule/results/azioneFallita.php");
    }

    mysqli_close($conn);
    die();
?>