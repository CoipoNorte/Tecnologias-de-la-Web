<?php
    require 'database.php';

    $message = '';
    /* En el caso de que  el formulario envie ambos datos de la casilla email y password se insertaran en la tabla de la base de datos */
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (email, nombre, apellido, password) VALUES (:email, '$_POST[nombre]', '$_POST[apellido]', :password)";
        $stmt = $connn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = ':D';
        } else {
            $message = ':(';
        }
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
                            <h2 class="display-4 mb-2">SING UP</h2>
                            
                            <hr class="hr-light">
                            <!-- Descripcion -->
                            <h4 class="my-4 lead">Registrate para aprovechar las funciones de nuestra pag web.</h4>
                            <!-- Muestra si es que se logro registrarse correctamente o no -->
                            <?php if(!empty($message)): ?>
                                <p> <?= $message ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!--Formulario para registrarse en la pagina-->
                <div class="row g-5 d-flex justify-content-center">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-4">Datos</h4>
                        <form class="needs-validation" action="signup.php" method="POST">
                            <div class="row g-3">
                                
                                <div class="col-sm-6">
                                    <label for="nombre" class="form-label">Nombres</label>
                                    <input name="nombre" type="text" class="form-control">
                                    <div class="invalid-feedback">
                                        Nombre no valido.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="apellido" class="form-label">Apellidos</label>
                                    <input name="apellido" type="text" class="form-control">
                                    <div class="invalid-feedback">
                                        Apellido no valido.
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" placeholder="your@email">
                                    <div class="invalid-feedback">
                                        Correo no valido.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input name="password" type="password" class="form-control" placeholder="******">
                                    <div class="invalid-feedback">
                                        Contraseña no valida.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Confirmar Contraseña</label>
                                    <input name="confirm_password" type="password" class="form-control" placeholder="******">
                                    <div class="invalid-feedback">
                                        Contraseña no valida.
                                    </div>
                                </div>

                            </div>
                            <hr class="my-4">
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--PIE DE PAG-->
            <footer class="my-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2017–2021 COPOS COMPANY</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">WILLIAS</a></li>
                    <li class="list-inline-item"><a href="#">PANDARIAN</a></li>
                    <li class="list-inline-item"><a href="#">CRISTIANF</a></li>
                </ul>
            </footer>
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