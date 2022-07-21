<?php
    include "../conexion.php";
    //Agregar a la tabla de carta el valor enviado por el formulario de Vino.php
    $sql = "INSERT INTO cava (id_vino,n_vino,p_vino,imagen) 
            VALUES ('$_GET[id]','$_GET[n_vino]',$_GET[p_vino],'$_GET[imagen]')";
    //Si la consulta se realizo correctamente regresamos al cabezal de cava.php y cerramos la consulta
    if($conn -> query($sql) === TRUE){   
        header("Location: ../Cava.php");
        mysqli_close($conn);
        exit;
    }else{
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>