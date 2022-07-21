<?php 
    include "conexion.php";

    $sql = "INSERT INTO productos.productos_ (id, nombre, precio, imagen, categoria, descripcion)
    VALUES ($_GET[id], '$_GET[nombre]', $_GET[precio], '$_GET[imagen]', '$_GET[categoria]', '$_GET[descripcion]')";

    if ($conn->query($sql) === TRUE){
        header("Location: lab5.html");
    }else{
        echo "Error: ". $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>