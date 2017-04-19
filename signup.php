<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "utenti";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    if(strcmp($_POST["password"], $_POST["passwordCheck"]) >= 0){
        $passwordHash = hash("sha512", $_POST["password"]);
    }
    else{
        header("Location: http://localhost/SitoAule/results/azioneFallita.php");
        die();
    }
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stm = $conn->prepare("insert into utenti (username, nome, cognome, passwordHash, admin) values(?, ?, ?, ?, false )");
    $stm->bind_param("ssss", $username, $nome, $cognome, $passwordHash);


    if ($stm->execute()) {
        $cookieFirstVisitName = "firstVisitSitoAule";
        setcookie($cookieFirstVisitName, "false", time() + (86400 * 30), "/");
        $_SESSION["username"] = $username;
        $_SESSION["nome"] = $nome;
        $_SESSION["cognome"] = $cognome;
        header("Location: http://localhost/SitoAule/results/successo.php");
    }else{
        header("Location: http://localhost/SitoAule/results/azioneFallita.php");
    }

    mysqli_close($conn);
    die();
?>