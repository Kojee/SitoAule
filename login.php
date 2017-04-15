<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "utenti";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $passHash = hash("sha512", $_POST["password"]);

    if ($conn->connect_error) {
        die("Connection failed: " . mysqli_connect_error());
    }

   $stm = $conn->prepare("select username from utenti where username = ? and passwordHash = ?");
    $stm->bind_param("ss", $username, $passHash);

    //$stm = $conn->("select username from utente where username = '" . $username . "' and passwordHash = '" . $passHash . "'");

    if ($stm->execute()) {
        $result = $stm->get_result();
        if($result->num_rows == 1){
            $_SESSION["username"] = $username;
            header("Location: http://localhost/SitoAule/index.php?status=ok");
        }
        else{
            header("Location: http://localhost/SitoAule/index.php?status=err");
        }
    }
    else
    {
        header("Location: http://localhost/SitoAule/index.php?status=err");
    }
    mysqli_close($conn);
    die();