<?php
    include "../conexion.php";
    //Agregar a la tabla de carta el valor enviado por el formulario de carta.php
    $sql = "INSERT INTO carta (id_plato,n_plato,p_plato,img_c) 
            VALUES ($_GET[id],'$_GET[n_plato]',$_GET[p_plato],'$_GET[imagen]')";
    //Si la consulta se realizo correctamente regresamos al cabezal de carta.php y cerramos la consulta
    if($conn -> query($sql) === TRUE){   
        header("Location: ../Carta.php");
        mysqli_close($conn);
        exit;
    }else{
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>