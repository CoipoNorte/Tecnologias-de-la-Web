<?php
    include "../conexion.php";

    $id = $_GET['id']; // obtener id a traves de una cadena query

    $del = mysqli_query($conn,"DELETE FROM carta where id_plato = $id"); // borrar query 
    $del2 = mysqli_query($conn,"DELETE FROM ratio_producto_carta where id_producto = $id"); // borrar query

    if($del && $del2)
    {
        mysqli_close($conn); // cerrar conexión
        header("Location: ../Carta.php"); // direccionar a index
        exit;	
    }
    else
    {
        echo "Error al borrar fila"; // error al borrar    
    }
?>