<?php
$servername = "localhost";
$username = "root";
$password = "";

//Creamos la conexion
$conn = new mysqli($servername, $username, $password);

//verificamos la conexion
if ($conn->connect_error){
    die("Conevion fallida: " . $conn->connect_error);
}

?>