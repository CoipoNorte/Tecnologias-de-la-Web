<?php
    include "conexion.php";

    $sql = "INSERT INTO cava (id_vino,n_vino,p_vino,imagen) 
            VALUES ('$_GET[id]','$_GET[n_vino]',$_GET[p_vino],'$_GET[imagen]')";

    if($conn -> query($sql) === TRUE){   
        header("Location: Cava.php");
        mysqli_close($conn);
        exit;
    }else{
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>