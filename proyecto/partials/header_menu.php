
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
                        <a class="nav-link" href="Carta.php">Carta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Cava.php">Cava</a>
                    </li>
                    <li class="nav-item">
                        <a href="reservacion.php" class="btn btn-outline-success">Reservación</a>
                    </li>
                    
                    <!--Separador--><div class="mb-1"></div><!--Separador-->
                    <?php if(!empty($user)): ?>
                        <li class="nav-item">
                            <a href="logout.php" class="btn btn-outline-primary">Salir</a>
                        </li>
                        <?php else: ?>
                            <li class="nav-item">
                            <a href="login.php" class="btn btn-outline-warning">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>                
            </div>
        </div>
    </nav> 
