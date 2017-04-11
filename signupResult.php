<?php
    $result = $_GET["registration"];
    if(strcmp($result, "true") >= 0) {

        header("refresh=3;url=http://localhost/Aule/index.php");
        echo "registrazione corretta;";
        die();
    }else{

        header("refresh=5;url=http://localhost/Aule/index.php");
        echo $_GET["cause"];
        die();
    }