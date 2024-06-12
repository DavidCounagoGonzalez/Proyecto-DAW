<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Todos los animes</title>
        <?php include 'templates/head.view.php' ?>
        <link rel="stylesheet" href="assets/css/usuarios/inicio.css">
        <link rel="stylesheet" href="assets/css/usuarios/tarjetas.css">
        <link rel="stylesheet" href="assets/css/usuarios/verTodos.css">
        <link rel="stylesheet" href="assets/css/usuarios/perfil.css">
    </head>
    <body>
        <div class="main-panel">
            <?php include 'templates/navbar.view.php' ?>
            <div class="content row">
                <div  class="col-md-3 ml-md-5">
                    <div class="perfil">
                        <img src="/assets/img/FotosPerfil/<?php echo $_SESSION['usuario']['foto'] ?>" alt="Profile Photo">
                    </div>
                    <h2 class="userName"><?php echo $_SESSION['usuario']['nombre'] ?></h2>
                </div>
                <div class="col-md-8">
                    <ul class="nav nav-tabs">
                        <li class=""><a class="nav-link btn btn-primary active text-white" data-toggle="tab" href="#favoritos">Favoritos</a></li>
                        <li class=""><a class="nav-link btn btn-primary text-white" data-toggle="tab" href="#viendo">Viendo</a></li>
                        <li class=""><a class="nav-link btn btn-primary text-white" data-toggle="tab" href="#completado">Completado</a></li>
                        <li class=""><a class="nav-link btn btn-primary text-white" data-toggle="tab" href="#pendiente">Pendiente</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="favoritos" class="tab-pane fade active show">
                            <div class="row cardContainer">
                                <?php
                                if (isset($favoritos)) {
                                    foreach ($favoritos as $favorito) {
                                        ?>
                                        <div class="col-12 col-md-6 col-lg-4 mt-4 cardContainer anime-card" >
                                            <div class="card mx-auto" style="background-image: url('<?php echo $favorito['imagenes'] ?>');"
                                                 data-descripcion="<?php echo $favorito['descripcion'] ?>"
                                                 data-generos="<?php echo $favorito['generosStr'] ?>"
                                                 data-episodios="<?php echo $favorito['episodios'] ?>" 
                                                 data-enemision="<?php echo $favorito['en_emision'] ?>" 
                                                 data-emision="<?php echo $favorito['fecha_emision'] ?>" 
                                                 data-calificacion="<?php echo $favorito['calificacion'] ?>">
                                                <div class="card-body-overlay">
                                                    <h5 class="card-title"><?php echo $favorito['titulo'] ?></h5>
                                                    <button class="eliminar" value="3" data-anime="<?php echo $favorito['id'] ?>">
                                                        <i class="fa-solid fa-trash icon-eliminar"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div id="viendo" class="tab-pane fade">
                            <div class="row cardContainer">
                                <?php
                                if (isset($viendo)) {
                                    foreach ($viendo as $animeV) {
                                        ?>
                                        <div class="col-12 col-md-6 col-lg-4 mt-4 cardContainer anime-card" >
                                            <div class="card mx-auto" style="background-image: url('<?php echo $animeV['imagenes'] ?>');"
                                                 data-descripcion="<?php echo $animeV['descripcion'] ?>"
                                                 data-generos="<?php echo $animeV['generosStr'] ?>"
                                                 data-episodios="<?php echo $animeV['episodios'] ?>" 
                                                 data-enemision="<?php echo $animeV['en_emision'] ?>" 
                                                 data-emision="<?php echo $animeV['fecha_emision'] ?>" 
                                                 data-calificacion="<?php echo $animeV['calificacion'] ?>">
                                                <div class="card-body-overlay">
                                                    <h5 class="card-title"><?php echo $animeV['titulo'] ?></h5>
                                                    <button class="eliminar" value="1" data-anime="<?php echo $animeV['id'] ?>">
                                                        <i class="fa-solid fa-trash icon-eliminar"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div id="completado" class="tab-pane fade">
                            <div class="row cardContainer">
                                <?php
                                if (isset($completados)) {
                                    foreach ($completados as $completado) {
                                        ?>
                                        <div class="col-12 col-md-6 col-lg-4 mt-4 cardContainer anime-card" >
                                            <div class="card mx-auto" style="background-image: url('<?php echo $completado['imagenes'] ?>');"
                                                 data-descripcion="<?php echo $completado['descripcion'] ?>"
                                                 data-generos="<?php echo $completado['generosStr'] ?>"
                                                 data-episodios="<?php echo $completado['episodios'] ?>" 
                                                 data-enemision="<?php echo $completado['en_emision'] ?>" 
                                                 data-emision="<?php echo $completado['fecha_emision'] ?>" 
                                                 data-calificacion="<?php echo $completado['calificacion'] ?>">
                                                <div class="card-body-overlay">
                                                    <h5 class="card-title"><?php echo $completado['titulo'] ?></h5>
                                                    <button class="eliminar" value="2" data-anime="<?php echo $completado['id'] ?>">
                                                        <i class="fa-solid fa-trash icon-eliminar"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div id="pendiente" class="tab-pane fade">
                            <div class="row cardContainer">
                                <?php
                                if (isset($pendientes)) {
                                    foreach ($pendientes as $pendiente) {
                                        ?>
                                        <div class="col-12 col-md-6 col-lg-4 mt-4 cardContainer anime-card" >
                                            <div class="card mx-auto" style="background-image: url('<?php echo $pendiente['imagenes'] ?>');"
                                                 data-descripcion="<?php echo $pendiente['descripcion'] ?>"
                                                 data-generos="<?php echo $pendiente['generosStr'] ?>"
                                                 data-episodios="<?php echo $pendiente['episodios'] ?>" 
                                                 data-enemision="<?php echo $pendiente['en_emision'] ?>" 
                                                 data-emision="<?php echo $pendiente['fecha_emision'] ?>" 
                                                 data-calificacion="<?php echo $pendiente['calificacion'] ?>">
                                                <div class="card-body-overlay">
                                                    <h5 class="card-title"><?php echo $pendiente['titulo'] ?></h5>
                                                    <button class="eliminar" value="4" data-anime="<?php echo $pendiente['id'] ?>">
                                                        <i class="fa-solid fa-trash icon-eliminar"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include 'templates/footer.view.php' ?>
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
                            <p id="animeGeneros"></p>
                            <p id="animeEpisodios"></p>
                            <p id="animeEmision"></p>
                            <p id="animeDescripcion"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include 'templates/scripts.view.php' ?>
        <script src="/assets/js/tarjetas.js"></script>
    </body>
