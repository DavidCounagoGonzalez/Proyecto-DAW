<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portada Fusionada</title>
        <?php include 'templates/head.view.php' ?>
        <link rel="stylesheet" href="assets/css/usuarios/inicio.css">
        <link rel="stylesheet" href="assets/css/usuarios/tarjetas.css">
    </head>
    <body>
        <div class="main-panel">
            <?php include 'templates/navbarInicio.view.php' ?>
            <div class="wrapper wrapper-full-page">
                <div class="contenedor">
                    <div class="texto text-center">
                        <h1><a class="" href="/"><img src="/assets/img/LogoKeroAnimeBG.png"></a></h1>
                        <h2>Bienvenidos a KeroAnime</h2>
                        <p>Este es un texto de ejemplo que se superpone ligeramente sobre la imagen a la derecha.</p>
                        <div class="mt-3">
                            <a class="btn btn-primary btn-inicio" href="/accounts/login">Acceder</a>
                        </div>
                    </div>
                    <div class="imagen">
                        <img src="/assets/img/PoratdaKeroAnime.jpg" alt="Imagen de ejemplo">
                    </div>
                </div>

                <div id="carouselInicio" class="carousel slide mt-5" data-ride="carousel">
                    <div class="carousel-title text-center">
                        <h2><a href="/verTodos">Ver todos ></a></h2>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        $activo = true;

                        foreach ($animesPart as $parte) {
                            ?>
                            <div class="carousel-item <?php echo $activo ? 'active' : '' ?>">
                                <div class="row justify-content-center">
                                    <?php foreach ($parte as $anime) { ?>
                                        <div class="col-md-6 col-lg-3 mt-4 mt-lg-0 cardContainer">
                                            <div class="card mx-auto" style="background-image: url('<?php echo $anime['imagenes'] ?>');"
                                                 data-descripcion="<?php echo $anime['descripcion'] ?>"
                                                 data-episodios = " <?php echo $anime['episodios'] ?>"
                                                 data-enEmision = " <?php echo $anime['en_emision'] ?> "
                                                 data-emision = "<?php echo $anime['fecha_emision'] ?> "
                                                 data-calificacion = "<?php echo $anime['calificacion'] ?>">
                                                <div class="card-body-overlay">
                                                    <h5 class="card-title"><?php echo $anime['titulo'] ?></h5>
                                                    <button class="btn btn-info guarda">Hola</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                            $activo = false;
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselInicio" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselInicio" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <?php include 'templates/footer.view.php' ?>
        </div>
        <div class="modal fade" id="animeModal" tabindex="-1" aria-labelledby="animeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="animeModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="animeCalificacion"></p>
                        <p id="animeEpisodios"></p>
                        <p id="animeEmision"></p>
                        <p id="animeDescripcion"></p>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'templates/scripts.view.php' ?>
        <script src="/assets/js/tarjetas.js"></script>
    </body>
</html>