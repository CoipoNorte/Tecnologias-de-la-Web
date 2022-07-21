<?php 
    include "../conexion.php";

    $id = $_GET['id']; // obtener id
    $qry = mysqli_query($conn,"SELECT * from cava where id_vino='$id'"); // seleccionar que coincida con la id
    $data = mysqli_fetch_array($qry); // sacar
    if(isset($_POST['update'])) // Cuando hacer click en el boton de actualizar
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre_v'];
        $precio = $_POST['precio_v'];
        $imagen = $_POST['imagen'];
        $edit = mysqli_query($conn,"UPDATE cava set n_vino='$nombre', p_vino=$precio, imagen='$imagen'
                                    WHERE id_vino='$id'");
        if($edit)
        {
            mysqli_close($conn); // Close connection
            header("Location: ../Cava.php"); // redirects to index page
            exit;
        }
        else
        {
            echo mysqli_error($conn);
        }    	
    }
?>