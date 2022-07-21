<?php
    //Se conecta a una BD publica de internet con los siguientes parametros a traves de PDO(PHP Data Objects)
    $servername = "35.195.138.120";
    $username  = "root";
    $password = "HtWAsMRa6fLggHn";
    $nombrebd = "proyectotc";

    try {
        $connn = new PDO("mysql:host=$servername;dbname=$nombrebd;", $username, $password);
    } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
    }
?>
