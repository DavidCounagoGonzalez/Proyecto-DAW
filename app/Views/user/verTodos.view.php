<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portada Fusionada</title>
        <?php include 'templates/head.view.php' ?>
        <link rel="stylesheet" href="assets/css/usuarios/inicio.css">
        <link rel="stylesheet" href="assets/css/usuarios/tarjetas.css">
        <link rel="stylesheet" href="assets/css/usuarios/verTodos.css">
    </head>
    <body>
        <div class="main-panel">
            <?php include 'templates/navbar.view.php' ?>
            <div class="content">
                <div class="filters-container text-center">
                    <h2>Filtros</h2>
                    <button class="btn btn-primary d-lg-none" type="button" data-toggle="collapse" data-target="#filtersCollapse" aria-expanded="false" aria-controls="filtersCollapse">
                        <i class="tim-icons icon-zoom-split"></i>
                    </button>
                    <div class="collapse d-lg-block mt-2" id="filtersCollapse">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="filtroTitulo">Título</label>
                                    <input id="filtroTitulo" name='filtroTitulo' type="text" class="form-control" placeholder="Título del Anime" value="<?php echo $input['titulo'] ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="filtroCalificacion">Calificación</label>
                                    <select class="form-control selectCustom" id="filtroCalificacion" name="filtroCalificacion">
                                        <option value="">-----</option>
                                        <option value="TP">Todos los públicos</option>
                                        <option value="12">+12</option>
                                        <option value="16">+16</option>
                                        <option value="18">+18</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="selectGeneros">Géneros</label>
                                    <select class="form-control selectGeneros custom-select" id="selectGeneros" name="generos[]" multiple>
                                        <?php
                                        foreach ($generos as $genero) {
                                            ?>
                                            <option value="<?php echo $genero['id'] ?>">
                                                <?php echo $genero['genero'] ?>
                                            </option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="filtroEnEmision">En emision</label>
                                    <select class="form-control selectCustom" id="filtroEnEmision" name="filtroEnEmision">
                                        <option value="">------</option>
                                        <option value="1">En emision</option>
                                        <option value="0">Finalizada</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" id="cardContainer">

                </div>
                <div class=" row pagination" id="pagination"></div>
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
                            <p id="animeEpisodios"></p>
                            <p id="animeEmision"></p>
                            <p id="animeDescripcion"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'templates/scripts.view.php' ?>
        <script src="/assets/js/paginacionTarjetas.js"></script>
        <script src="/assets/js/tarjetas.js"></script>
        <script type="text/javascript">
            const animes = <?php echo json_encode($animes); ?>;
        </script>
        <script src="/assets/js/filtrosAllAnimes.js"></script>
    </body>
