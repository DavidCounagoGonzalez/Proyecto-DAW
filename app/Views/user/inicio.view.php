<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portada Fusionada</title>
        <?php include 'templates/head.view.php' ?>
        <link rel="stylesheet" href="assets/css/usuarios/inicio.css">
    </head>
    <body>
        <div class="main-panel">
            <?php include 'templates/navbar.view.php' ?>
            <div class="wrapper wrapper-full-page">
                <div class="contenedor">
                    <div class="texto text-center">
                        <h1><a class="" href="/"><img src="/assets/img/LogoKeroAnimeBG.png"></a></h1>
                        <h2>Bienvenidos a KeroAnime</h2>
                        <p>Este es un texto de ejemplo que se superpone ligeramente sobre la imagen a la derecha.</p>
                        <div class="mt-3">
                            <a class="btn btn-primary" href="/accounts/login">Acceder</a>
                        </div>
                    </div>
                    <div class="imagen">
                        <img src="/assets/img/PoratdaKeroAnime.jpg" alt="Imagen de ejemplo">
                    </div>
                </div>

                <div id="carouselExample" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                            $activo = true;
                            
                            foreach($animesPart as $parte){
                        ?>
                        <div class="carousel-item <?php echo $activo ? 'active' : '' ?>">
                            <div class="row justify-content-center">
                                <?php foreach($parte as $anime){ ?>
                                <div class="col-md-3">
                                    <div class="card" style="background-image: url('<?php echo $anime['imagenes'] ?>');">
                                        <div class="card-body-overlay">
                                            <h5 class="card-title"><?php echo $anime['titulo'] ?></h5>
                                            <p class="card-text"><?php echo $anime['descripcion'] ?></p> 
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                            <?php 
                                $activo = false;
                                } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <?php include 'templates/footer.view.php' ?>
        </div>
        <?php include 'templates/scripts.view.php' ?>
<!--        <script src="/assets/js/carrouselInicio.js"></script>-->
    </body>
</html>