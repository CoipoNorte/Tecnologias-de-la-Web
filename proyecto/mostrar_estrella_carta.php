<?php
    include "conexion.php";
    //ignora todos los reportes de advertencia
    error_reporting(E_ALL ^ E_WARNING);
    //en caso de que no exista ningun usuario en sesión el user_id se asigna como 1 en caso contrario se asigna al id del usuario en sesión
    $user_id = 1;
    if (isset($_SESSION['user_id'])) {
        $user_id = $user['id'];
    }
    //consulta de todas las columnas en la tabla de Carta
    $query = "SELECT * FROM carta";
    $result = mysqli_query($conn, $query);
    //Retira como arreglo los resultados de la tabla de carta
    while($row = mysqli_fetch_array($result)){
        $id_producto = $row['id_plato'];
        $nom_plato = $row['n_plato'];
        $pre_plato = $row['p_plato'];
        $img = $row['img_c'];

        // Puntaje Estrella
        $query = "SELECT * FROM ratio_producto_carta WHERE id_producto = " . $id_producto . " AND user_id = " . $user_id;
        $productResult = mysqli_query($conn, $query) or die (mysqli_error($conn));
        $getRating = mysqli_fetch_array($productResult);
        $rating = $getRating['rating'];
        
        // Puntaje
        $query = "SELECT ROUND(AVG(rating), 1) as numRating FROM ratio_producto_carta WHERE id_producto= ". $id_producto;
        $avgresult = mysqli_query($conn, $query) or die (mysqli_error($conn));
        $fetchAverage = mysqli_fetch_array($avgresult);
        $numRating = $fetchAverage['numRating'];
        if($numRating <= 0){
            $numRating = 0;
        }
?>
<!-- Modal que se abre al apretar el boton de la llave en interfaz, contiene un formulario que modifica el Plato en Cuestión-->
<div class="modal fade" id="exampleModal_id_<?php echo $id_producto?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Modificar Plato</h5>
            </div>
            <div class="modal-body">
                <div> 
                <form action="admin/actualizar_p.php?id=<?php echo $id_producto?>" method="POST">
                    <input type="number" class="form-control mt-3 mb-3" name="id" value="<?php echo $id_producto?>" readonly>
                    <input type="text" class="form-control mt-3 mb-3" name="nombre_p" value="<?php echo $nom_plato ?>" Required>
                    <input type="number" class="form-control mt-3 mb-3" name="precio_p" value="<?php echo $pre_plato ?>" Required>
                    <input type="text" class="form-control mt-3 mb-3" name="imagen" value="<?php echo $img ?>" Required>
                    <input type="submit" class="btn btn-primary" name="update" value="Update">
                </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Muestra el contenido de la tabla Carta en filas de una tabla -->
<tr>
    <td id="img"><img class="featurrete-image img-responsive" src="<?php echo $img?>" width=60%></td>
    <td>
        <h3><?php echo $nom_plato?></h3>
        <p><?php echo $pre_plato?></p>
        <!-- Si es que no se encuentra ningun usuario en sesión no se puede votar-->
        <?php if(!empty($user)):?>
        <select name="star_rating_option" class="rating" id='star_rating_<?php echo $id_producto; ?>'
            data-id='rating_<?php echo $id_producto; ?>'>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <?php else: echo "Logearse para votar <br>" ?>
        <?php endif ?>
        Rating : <span id='numeric_rating_<?php echo $id_producto; ?>'><?php echo $numRating; ?></span> 
        <!-- Botones de eliminar y Modificar solo disponible para usuario con rol de "admin"-->
        <?php if(!empty($user) && $user['roles'] === 'admin'): ?>
        <th scope= "row" class="primary"><a href="admin/eliminar_p.php?id=<?php echo $id_producto?>"><i class="fa fa-trash"></i></a></th>
        <th scope="row" class="primary"><button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal_id_<?php echo$id_producto?>"><i class="fa fa-wrench"></i></button></th>
        <?php endif ?>
    </td>
</tr>
<?php } ?>