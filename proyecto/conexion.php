<?php 
    //Se conecta a una BD publica de internet con los siguientes parametros a traves de mysqli
    $servername = "35.195.138.120";
    $username  = "root";
    $password = "HtWAsMRa6fLggHn";
    $nombrebd = "proyectotc";

    //Creamos conexión
    $conn = new mysqli($servername, $username, $password,$nombrebd);
    if($conn->connect_error){
        die("conexión fallida" . $conn->connect_error);
    }

    //echo "Conexión establecida... <br>";

?>