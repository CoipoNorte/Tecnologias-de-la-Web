<?php
    include("conexion.php");

    $id = $_GET["id"];
                                                    
    $query = "DELETE FROM productos.productos_ WHERE id='$id'";

    if ($conn->query($query) === true) {
        header("Location: lab5_mostrar.php");
    } else {
        echo "ERROR: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>