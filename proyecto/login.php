<?php
    session_start();
    
    //En el caso de que se encuentre una sesión se direcciona a reserva.php
    if (isset($_SESSION['user_id'])) {
        header("Location: /proyecto/reservacion.php");
    }
    require 'database.php';
    //Solo entra si es que se encuentre la casilla rellena de email y password
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $connn->prepare('SELECT id, email, nombre, apellido, password FROM users WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        //--------
        $message = '';
        // Si es que coincide con la contraseña guardada en la BD se direcciona a reserva.php
        if (!empty($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header("Location: /proyecto/reservacion.php");
        } else {
            $message = 'Lo sentimos, tus datos no coinciden';
        }
    }
    else {
        $message = ':(';
    }
?>

<!doctype html>
<html lang="es">
<head>
    <!--HEAD-->
    <?php require 'partials/head.php' ?>    
</head>
<body class="fb-reserva" id="body-pag" onload="alIniciar()">

    <div class="container caja-trans h-100 w-100">
        <!--HEADER-->
        <header>
            <?php require 'partials/header_reservacion.php' ?>
        </header> 

        <!--MAIN-->
        <main class="row d-flex justify-content-center anim-inic mt-5">
            <div class="col-9">
                <div class="py-5 text-center">
                    <img src="./img/Panda.png" alt="" width="72" height="57">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <!-- Heading -->
                            <h2 class="display-4 mb-2">LOGIN</h2>
                            
                            <hr class="hr-light">
                            <!-- Descripcion -->
                            <h4 class="my-4 lead">Accede para aprovechar las funciones de nuestra pag web.</h4>
                            <!--Muestra si es que los datos no han coincidido-->
                            <?php if(!empty($message)): ?>
                                <p> <?= $message ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row g-5 d-flex justify-content-center">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-4">Datos</h4>
                        <!--Formulario para logearse-->
                        <form class="needs-validation" action="login.php" method="POST">
                            <div class="row g-3">
                                
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="your@email">
                                    <div class="invalid-feedback">
                                        Correo no valido.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="******">
                                    <div class="invalid-feedback">
                                        Contraseña no valida.
                                    </div>
                                </div>

                            </div>
                            <hr class="my-4">
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Acceder</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!--FOOTER-->
            <?php require 'partials/footer_menu.php' ?> 

        </main>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
            crossorigin="anonymous">
    </script>
    <!-- Ajax JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JavaScript -->
    <script src="app.js"></script>
</body>
</html>