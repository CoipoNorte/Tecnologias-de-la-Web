<?php
    include "conexion.php";
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratorio 5</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Styles -->
    <link href="./css/css-principal.css" rel="stylesheet">
</head>
<body>
   
    <!--HEADER-->
    <header>
        <!--NAV-->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="./lab5_inicio.html">Laboratorio 5</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse me-2" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./lab5_mostrar.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./lab5_agregar.html">Agregar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="f-principal">
        <div class="caja-trans">
            <div class="container-fluid d-flex align-items-center justify-content-center vh-100">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-md-12">
                        <!--TABLA-->
                        <table class="table text-white">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">accion</th>
                                </tr>
                            </thead>
                              
                            <tbody> 
                                <?php

                                $query = "SELECT * FROM productos.productos_";
                                $result = mysqli_query($conn, $query);

                                while($fila = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $fila["id"] ?></td>
                                        <td><?php echo $fila["nombre"] ?></td>

                                        <td>
                                            <a href="lab5_ver.php?id=<?php echo $fila['id'] ?>"">
                                                <button type='button' class='btn btn-primary'>Ver</button>
                                            </a>
                                            <a href="lab5_modificar.php?id=<?php echo $fila['id'] ?>">
                                                <button type='button' class='btn btn-success'>Modificar</button>
                                            </a>
                                            <a href="eliminar.php?id=<?php echo $fila['id'] ?>"">
                                                <button type='button' class='btn btn-danger'>Eliminar</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
            crossorigin="anonymous">
    </script>
</body>
</html>