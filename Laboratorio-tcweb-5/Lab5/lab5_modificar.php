<?php
    include("conexion.php");

    $id = $_GET["id"];

    $query = "SELECT * FROM productos.productos_ WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);
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
                    <div class="col-md-12 text-white">
                        <!--FORMULARIO-->
                        <form action="modificar.php" method="post">
                            <h2>Modificar - Producto</h2>
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input class="form-control" type="text" name="id" value="<?php echo $data["id"] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input class="form-control" type="text" name="nombre" value="<?php echo $data["nombre"] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Precio</label>
                                <input class="form-control" type="text" name="precio" value="<?php echo $data["precio"] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Imagen</label>
                                <input class="form-control" type="text" name="imagen" value="<?php echo $data["imagen"] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Categoria</label>
                                <input class="form-control" type="text" name="categoria" value="<?php echo $data["categoria"] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripcion</label>
                                <input class="form-control" type="text" name="descripcion" value="<?php echo $data["descripcion"] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>

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