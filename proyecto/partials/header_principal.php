        <!--NAV-->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"> 
                    <?php if(!empty($user)): ?>
                        <?= $user['nombre']; ?>
                    <?php else: ?>
                        La ratatouille
                    <?php endif; ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--Separador--><div class="container"></div><!--Separador-->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#body-pag">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Carta-pag">Carta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Cava-pag">Cava</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Ubicacion-pag">Ubicación</a>
                        </li>
                        <li class="nav-item">
                            <a href="reservacion.php" class="btn btn-outline-warning">Reservación</a>
                        </li>
                        
                        <!--Separador--><div class="mb-1"></div><!--Separador-->
                        <?php if(!empty($user)): ?>
                            <li class="nav-item">
                                <a href="logout.php" class="btn btn-outline-primary">Salir</a>
                            </li>
                            <?php else: ?>
                            <li class="nav-item">
                                <a href="login.php" class="btn btn-outline-success">Login</a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </nav>
        <!--INICIO-->
        <div id="Inicio-pag">
            <div class="caja-trans">
                <div class="container-fluid d-flex align-items-center justify-content-center vh-100">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-md-10 anim-inic">
                            <!-- Heading -->
                            <h2 class="display-4 mb-2">La Ratatouille</h2>
                            
                            <hr class="hr-light">
                            <!-- Descripcion -->
                            <h4 class="my-4">La buena comida es como la música, sólo hay que quedarse atento y apreciar los sabores</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
