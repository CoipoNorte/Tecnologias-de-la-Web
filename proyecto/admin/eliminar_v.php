<?php
    include "../conexion.php";

    $id = $_GET['id']; // obtener id a traves de una cadena query

    $del = mysqli_query($conn,"DELETE FROM cava where id_vino = '$id'"); // borrar query 
    $del2 = mysqli_query($conn,"DELETE FROM ratio_producto where id_producto = '$id'"); // borrar query

    if($del && $del2)
    {
        mysqli_close($conn); // cerrar conexión
        header("Location: ../Cava.php"); // direccionar a index
        exit;	
    }
    else
    {
        echo "Error al borrar fila"; // error al borrar    
    }
?>