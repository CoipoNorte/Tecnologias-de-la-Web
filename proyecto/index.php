<?php
    session_start();
    require "database.php";
    // Ve si encuentra algun usuario en Sesión
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
?>

<!doctype html>
<html lang="es">
<head>
    <!--HEAD-->
    <?php require 'partials/head.php' ?> 
</head>
<body class="fb-principal" id="body-pag" onload="alIniciar()">
    <!--HEADER-->
    <header>
            <?php require 'partials/header_principal.php' ?>
    </header>
    
    <main>
        <!-- CARRUSEL -->
        <section id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <section class="carousel-item active f-c1">
                    <div class="container caja-trans vh-100">
                        <div class="carousel-caption text-lg-start">
                            <h1>Remy</h1>
                            <p>Si eres lo que comes, entonces solo quiero comer lo bueno.</p>
                        </div>
                    </div>
                </section>
                <section class="carousel-item f-c2">
                    <div class="container caja-trans vh-100">
                        <div class="carousel-caption">
                            <h1>LA COCINA</h1>
                            <p>Los mejores sabores solo son alcanzados gracias por la maestria de nuestros cocineros.</p>
                        </div>
                    </div>
                </section>
                <section class="carousel-item f-c3">
                    <div class="container caja-trans vh-100">
                        <div class="carousel-caption text-lg-end">
                            <h1>Pandayin</h1>
                            <p>Esta pag fue realizada en conjunto a traves de discord por el grupo Pandayin.</p>
                        </div>
                    </div>
                </section>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </section>

        <!-- MARKETING -->
        <section class="container marketing">
            <hr class="featurette-divider">
            <!-- Tres columnas de texto debajo del carrusel -->
            <div class="row">
                <div class="col-lg-4">
                    <img src="Fondos/ChefXocolat.jpg" class="img-responsive rounded-circle" width="220" height="220" aria-label="Chef 1:140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <!-- / -->
                    <h2>Christian Bau</h2>
                    <p style="font-size: 20px">Chef poissonnier</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="Fondos/chefsAsiatico.jpg" class="img-responsive rounded-circle" width="220" height="220" aria-label="Chef 2:140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <!-- / -->
                    <h2>Kei Kobayashi</h2>
                    <p style="font-size: 20px">Chef saucier</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="Fondos/Chef3.jpg" class="img-responsive rounded-circle" width="220" height="220" aria-label="Chef 1:140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <!-- / -->
                    <h2>Francis Mallmann</h2>
                    <p style="font-size: 20px">Chef entremetier</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            <hr class="featurette-divider">
        </section>

        <!--MESA-->
        <section id="Mesa-pag">
            <div class="caja-trans">
                <div class="container-fluid d-flex align-items-center justify-content-center vh-100">
                    <div class="row d-flex justify-content-center text-center animado">
                        <div class="col-md-10">
                            <!-- Heading -->
                            <h2 class="display-4 mb-2">EL CONCEPTO</h2>
                            
                            <hr class="hr-light">
                            <!-- Descripcion -->
                            <h4 class="my-4">Tradición - Modernidad - Ratatouille</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FEATURETTES -->
        <section  class="marketing">
            <!-- Carta -->
            <article class="f-carta" id="Carta-pag">
                <div class="caja-trans">
                    <div class="container-fluid d-flex align-items-center justify-content-center vh-100">
                        <div class="row d-flex justify-content-center text-center animado">
                            <div class="col-md-10 featurette text-white">
                                <!-- Heading -->
                                <h2 class="display-4 mb-2 featurette-heading">La Carta.</h2>
                                
                                <hr class="hr-light">
                                <!-- Descripcion -->
                                <h4 class="my-4 lead">No cualquiera puede convertirse en un gran artista, pero un gran artista sí puede provenir de cualquier lugar.</h4>
                                <p><a class="btn btn-warning" href="./Carta.php">Ver Carta &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <!-- Cava -->
            <article class="f-cava" id="Cava-pag">
                <div class="caja-trans">
                    <div class="container-fluid d-flex align-items-center justify-content-center vh-100">
                        <div class="row d-flex justify-content-center text-center animado">
                            <div class="col-md-10 featurette text-white">
                                <!-- Heading -->
                                <h2 class="display-4 mb-2 featurette-heading">Bodega, Nuestros mejores vinos.</h2>
                                
                                <hr class="hr-light">
                                <!-- Descripcion -->
                                <h4 class="my-4 lead">“El vino da brillantez a las campiñas, exalta los corazones, enciende las pupilas y enseña a los pies la danza”</h4>
                                <p><a class="btn btn-warning" href="./Cava.php">Ver Carta &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <!-- Ubicacion -->
            <article class="f-ubic" id="Ubicacion-pag">
                <div class="caja-trans">
                    <div class="container-fluid d-flex align-items-center justify-content-center vh-100">
                        <div class="row d-flex justify-content-center text-center animado">
                            <div class="col-md-4 featurette text-white">
                                <!-- Heading -->
                                <h2 class="display-4 mb-2 featurette-heading">Nuestro Espacio.</h2>
                                
                                <hr class="hr-light">
                                <!-- Descripcion -->
                                <h4 class="my-4 lead">Un lugar cerca de tu hogar, un lugar para degustar de los mejores platos de nuestra ciudad.</h4>
                            </div>
                            <div class="col-md-8">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d935.8225828379576!2d-70.1339237238731!3d-20.2467904281182!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9152146ff08bbc1d%3A0xa9efc5d5a561e759!2sPorky!5e0!3m2!1ses!2sus!4v1620774333689!5m2!1ses!2sus" 
                                        allowfullscreen="" loading="lazy">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <hr class="featurette-divider">
        </section><!-- /.container -->
    </main>

    <!--FOOTER-->
    <?php require 'partials/footer_principal.php' ?> 

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
            crossorigin="anonymous">
    </script>
    <!-- JavaScript -->
    <script src="app.js"></script>
    <!-- Ajax JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--EFECTO PARA MOVIMIENTO LENTO DEL SCROLL-->
    <script>
		$(document).ready(function() { // Añade un desplazamiento suave a todos las ID
			$("a").on('click', function(event) { // Asegúrese de que this.hash tiene un valor antes de anular el comportamiento por defecto
				if (this.hash !== "") { // Evitar el comportamiento de los clics de anclaje por defecto
					event.preventDefault();
					var hash = this.hash;
					// Utilizar el método animate() de jQuery para añadir un desplazamiento suave de la página
					$('html, body').animate( {
						scrollTop: $(hash).offset().top
					}, 1000, function() { // 1000 milisegundos que tardara en concretarse el desplazamiento
						window.location.hash = hash;
					});
				} // fin del if
			});
		});
	</script>
</body>
</html>
