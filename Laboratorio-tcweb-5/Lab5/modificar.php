<?php
    include("conexion.php");

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $imagen = $_POST["imagen"];
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];
                                                    
    $sql = "UPDATE productos.productos_ SET nombre='$nombre', precio='$precio', imagen='$imagen', categoria='$categoria', descripcion='$descripcion' WHERE id='$id'";

    if ($conn->query($sql) === true) {
        header("Location: lab5_mostrar.php");
    } else {
        echo "ERROR: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>