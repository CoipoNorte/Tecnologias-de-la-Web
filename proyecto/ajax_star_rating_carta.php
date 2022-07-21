<?php
    session_start();
    require "database.php";
    // se necesita llamar denuevo a la base de datos PDO ya que comienza como un nuevo PHP
    if (isset($_SESSION['user_id'])) {
        $records = $connn->prepare('SELECT id, email, nombre, apellido, password FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results) > 0) {
            $user = $results;
        }
    }
    include "conexion.php";
    $user_id = $user['id'];
    $id_producto = $_POST['id_producto'];
    $rating = $_POST['rating'];

    // Checkea el rating que esta dentro de la tabla
    $query = "SELECT COUNT(*) AS countProduct FROM ratio_producto_carta WHERE id_producto = " . $id_producto . " AND user_id = " . $user_id;
    $result = mysqli_query($conn, $query);
    $getdata = mysqli_fetch_array($result);
    $count = $getdata['countProduct'];

    if($count == 0){
        $insertquery = "INSERT INTO ratio_producto_carta(user_id, id_producto, rating) values(". $user_id .", ". $id_producto . " , ". $rating .")";
        mysqli_query($conn, $insertquery) or die (mysqli_error($conn));
    }else{
        $updateRating = "UPDATE ratio_producto_carta SET rating = " . $rating . " WHERE user_id = " . $user_id . " AND id_producto = " . $id_producto;
        mysqli_query($conn, $updateRating) or die (mysqli_error($conn));
    }

    // Retira el rating
    
    $query = "SELECT ROUND(AVG(rating),1) as numRating FROM ratio_producto_carta WHERE id_producto = ". $id_producto;
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $getAverage = mysqli_fetch_array($result);
    $numRating = $getAverage['numRating'];

    $return_arr = array("numRating"=>$numRating);
    //Lo codifica como Json y lo envia a la función Ajax
    echo json_encode($return_arr);