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
    if(!isset($_POST["exact"])){
        $stm = $conn->prepare("select nome from aule where nome like ?");
        $param = "%" . $_POST["nomeAula"] . "%";
        $stm->bind_param("s",$param);
        if($stm->execute()){
            $result = $stm->get_result();
            $fetchAule = "aule=";
            while($row = $result->fetch_assoc()){
                $fetchAule = $fetchAule . $row["nome"] . ";";
            }
            header("Location: http://localhost/SitoAule/aule/aule.php?" . $fetchAule);
            die();
        }
    }else{
        $stm = $conn->prepare("insert into prenotazioni (username, nomeAula, data) values (?,?,?)");
        $stm->bind_param("sssss", $_POST["username"],$_POST["nomeAula"], $combinedDT);

        if ($stm->execute()) {
            header("Location: http://localhost/SitoAule/results/successo.php");
        }else{
            header("Location: http://localhost/SitoAule/results/azioneFallita.php");
        }
    }
    
    
?>