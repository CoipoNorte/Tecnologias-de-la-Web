<?php 
    include "../conexion.php";

    $id = $_GET['id']; // obtener id
    $qry = mysqli_query($conn,"SELECT * from carta where id_plato=$id"); // seleccionar que coincida con la id
    $data = mysqli_fetch_array($qry); // sacar
    if(isset($_POST['update'])) // Cuando hacer click en el boton de actualizar
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre_p'];
        $precio = $_POST['precio_p'];
        $imagen = $_POST['imagen'];
        $edit = mysqli_query($conn,"UPDATE carta set n_plato='$nombre', p_plato=$precio, img_c='$imagen'
                                    WHERE id_plato=$id");
        if($edit)
        {
            mysqli_close($conn); // Close connection
            header("Location: ../Carta.php"); // redirects to index page
            exit;
        }
        else
        {
            echo mysqli_error($conn);
        }    	
    }
?>