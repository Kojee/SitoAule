<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "utenti";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    if(strcmp($_POST["password"], $_POST["passwordCheck"]) >= 0){
        $passwordHash = hash("sha512", $_POST["password"]);
    }
    else{
        header("Location: http://localhost/SitoAule/index.php?status=err");
        die();
    }
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stm = $conn->prepare("insert into utenti (username, passwordHash, admin) values(?, ?, false )");
    $stm->bind_param("ss", $username, $passwordHash);


    if ($stm->execute()) {
        header("Location: http://localhost/SitoAule/index.php?status=ok");
    }else{
        header("Location: http://localhost/SitoAule/index.php?status=err" . mysqli_error($conn));
    }

    mysqli_close($conn);
    die();
?>