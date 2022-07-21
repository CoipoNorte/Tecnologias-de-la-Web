<?php
    include "../conexion.php";

    $id = $_GET['id']; // obtener id a traves de una cadena query

    $del = mysqli_query($conn,"DELETE FROM reservacion where id = $id"); // borrar query 

    if($del)
    {
        mysqli_close($conn); // cerrar conexión
        header("Location: ../reservacion.php"); // direccionar a index
        exit;	
    }
    else
    {
        echo "Error al borrar fila de reservacion"; // error al borrar    
    }
?>