<?php
    session_start();

    require 'database.php';

    if (isset($_SESSION['user_id'])) {
        $records = $connn->prepare('SELECT id, email, nombre, apellido, password, roles FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;
        
        if (count($results) > 0) {
            $user = $results;
        }
    }
        $msg = '';
    if(!empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['telefono']) && !empty($_POST['date'])) {
        
        $cont = $connn->prepare("SELECT count(*) as cont_existe from reservacion");
        $cont->execute();
        $consulta_existe = $cont->fetch(PDO::FETCH_ASSOC);
        if($consulta_existe["cont_existe"] > 0){
            $fecha_cmp = $_POST['date'];
            $consulta = $connn->prepare("SELECT COUNT(*) as contador from reservacion where reserva_inicio <= '$fecha_cmp' and reserva_termino >= '$fecha_cmp'");
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        }
        if($resultado["contador"] == 0 OR $consulta_existe["cont_existe"] == 0){
            $sql = "INSERT INTO reservacion (id, email_r, nombre_r, apellido_r, telefono_r, reserva_inicio, reserva_termino)
            VALUES (DEFAULT, '$_POST[email]', '$_POST[nombre]', '$_POST[apellido]', '$_POST[telefono]', '$_POST[date]', '$_POST[date_end]')";
            $stmt = $connn->prepare($sql);
            $stmt->execute();
            $msg = 'Reserva Realizada';
        }else{
            $msg = 'La hora esta Ocupada';
        }
        
    }
?>

<!doctype html>
<html lang="es">
<head>
    <!--HEAD-->
    <?php require 'partials/head.php' ?>    
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href='./jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>

</head>
<body class="fb-reserva caja-trans" id="body-pag" onload="alIniciar()">

    <div class="container vh-100 w-100">
        <!--HEADER-->
        <header>
            <!--NAV-->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">La ratatouille</a>
                </div>
            </nav>
        </header>

        <!--MAIN-->
        <main class="row d-flex justify-content-center h-100 anim-inic">
            <div class="col-sm-12 col-md-10">
            <!-- La reserva solo abre si es que el usuario esta logeado a una cuenta -->
            <?php if(!empty($user)): ?>

                <div class="py-5 text-center">
                    <img src="./img/Panda.png" alt="" width="72" height="57">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <!-- Heading -->
                            <h2 class="display-4 mb-2">RESERVACIÓN</h2>

                            <hr class="hr-light">
                            <!-- Descripcion -->
                            <h4 class="my-4 lead">Bienvenido <?= $user['nombre']; ?> <?= $user['apellido']; ?> <a href="logout.php">Log out</a></h4>
                            <ul>
                                <a href="Carta.php" class="btn btn-primary">Carta</a>
                                <a href="Cava.php" class="btn btn-primary">Cava</a>
                            </ul>
                            <p><?php echo $msg?></p>
                        </div>
                    </div>
                </div>
                <!-- Formulario para Agregar Reservas -->
                <div class="row g-5 d-flex justify-content-center">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-4">Datos de Reserva</h4>
                        <form class="needs-validation" action="" method="POST">
                            <div class="row g-3">
                                
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Nombres</label>
                                    <input name="nombre" id="nombre" type="text" class="form-control" value="<?= $user['nombre']; ?>" required>
                                    <div class="invalid-feedback">
                                        Nombre no valido.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Apellidos</label>
                                    <input name="apellido" id="apellido" type="text" class="form-control" value="<?= $user['apellido']; ?>" required>
                                    <div class="invalid-feedback">
                                        Apellido no valido.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input name="email" id="email" type="email" class="form-control" value="<?= $user['email']; ?>" readonly>
                                    <div class="invalid-feedback">
                                        Correo no valido.
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <label for="zip" class="form-label">Telefono</label>
                                    <input name="telefono" id="telefono" type="text" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Zip requerido.
                                    </div>
                                </div>
                                
                                <div class="col-md-7">
                                    <label for="zip" class="form-label">Fecha</label>
                                    <section>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input name="date" id="date" type='text' class="form-control" required/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker2'>
                                                <input name="date_end" id="date_end" type='text' class="form-control" readonly/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                
                            </div>
                            <hr class="my-4">
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Reservar mesa</button>
                        </form>

                        <!--TABLA-->
                        <div style="overflow:scroll">
                            <table class="table text-white">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Inicio</th>
                                        <th scope="col">Final</th>
                                    </tr>
                                </thead>
                                <!-- Lista de las reservas realizadas por el usuario -->
                                <tbody> 
                                <?php
                                    include 'conexion.php';
                                    $query = "SELECT * FROM reservacion";
                                    $result = mysqli_query($conn, $query);
                                    while($fila = mysqli_fetch_assoc($result)) {
                                ?>
                                <!-- Solo muestra las reservas realizadas por el usuario y si quiere eliminarla-->
                                    <?php if(($fila["email_r"] === $user['email']) && $user['roles'] === 'user'): ?>
                                    <tr>
                                        <td><?php echo $fila["nombre_r"] ?></td>
                                        <td><?php echo $fila["email_r"] ?></td>
                                        <td><?php echo $fila["telefono_r"] ?></td>
                                        <td><?php echo $fila["reserva_inicio"] ?></td>
                                        <td><?php echo $fila["reserva_termino"] ?></td>
                                        <td><a href="admin/eliminar_r.php?id=<?php echo $fila['id']?>"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                <!--Para el usuario con el Rol de Administrador le muestra todos las reservas de los usuarios como también
                                la habilidad de eliminarla-->
                                    <?php elseif($user['roles'] === 'admin'): ?>
                                    <tr>
                                        <th scope="row"><?php echo $fila["id"] ?></td>
                                        <td><?php echo $fila["nombre_r"] ?></td>
                                        <td><?php echo $fila["email_r"] ?></td>
                                        <td><?php echo $fila["telefono_r"] ?></td>
                                        <td><?php echo $fila["reserva_inicio"] ?></td>
                                        <td><?php echo $fila["reserva_termino"] ?></td>
                                        <td><a href="admin/eliminar_r.php?id=<?php echo $fila['id']?>"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php endif; ?>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <!-- En el caso de que no se encuentre ninguna sesión activa de usuario pedira logearse o registrarse en el caso de que
            no posea cuenta-->
            <?php else: ?>
                <div class="py-5 text-center">
                    <img src="./img/Panda.png" alt="" width="72" height="57">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <!-- Heading -->
                            <h2 class="display-4 mb-2">RESERVACIÓN</h2>
                            
                            <hr class="hr-light">
                            <!-- Descripcion -->
                            <h4 class="my-4 lead">En Ratatouille tenemos la mejor atención por medios tecnológicos, por favor siéntase a gusto de ingresar sus datos para reservar un espacio junto a nosotros, lo esperamos ansiosos de complacerlos con los mejores manjares del corazón de Arica.</h4>
                            <h4 class="my-4 lead">Please <a href="login.php">Login</a> / <a href="signup.php">Sign Up</h4>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            </div>
            
            <!--FOOTER-->
            <?php require 'partials/footer_menu.php' ?> 

        </main>
    </div>

    <!-- Bootstrap JavaScript
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
            crossorigin="anonymous">
    </script> -->
    <!-- Ajax JQuery
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- JavaScript -->
    <script src="app.js"></script>
    <script type="text/javascript">
        $(function() {
            // Funciones para el formato del seleccionador de fecha y hora
            $('#datetimepicker1').datetimepicker({
                format : 'YYYY-MM-DD HH:mm:00',
            }); 
            
            $('#datetimepicker2').datetimepicker({
                format : 'YYYY-MM-DD HH:mm:00',
            });
            /*En el caso de que el primer calendario cambie la hora el otro calendario mostrara la misma 
            fecha pero con la hora aumentada en 2 unidades*/
            $("#datetimepicker1").on("dp.change", function(e) {
                $('#datetimepicker2').data("DateTimePicker").date(e.date.add(2,'hours'));
            });
        });
    </script>
</body>
</html>
