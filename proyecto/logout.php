<?php
    //Destruir la sesión actual del usuario
    session_start();
    session_unset();
    session_destroy();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
?>
