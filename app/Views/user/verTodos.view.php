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
                <div class="filters-container">
                    <button class="btn btn-primary d-lg-none" type="button" data-toggle="collapse" data-target="#filtersCollapse" aria-expanded="false" aria-controls="filtersCollapse">
                        Mostrar/Ocultar Filtros
                    </button>
                    <div class="collapse d-lg-block mt-2" id="filtersCollapse">
                        <h2>Filtros</h2>
                        <div class="form-group">
                            <label for="genre-filter">Género:</label>
                            <select id="genre-filter" class="form-control">
                                <option value="all">Todos</option>
                                <option value="accion">Acción</option>
                                <option value="aventura">Aventura</option>
                                <option value="comedia">Comedia</option>
                                <!-- Agrega más opciones según tus géneros -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status-filter">Estado de Emisión:</label>
                            <select id="status-filter" class="form-control">
                                <option value="all">Todos</option>
                                <option value="en_emision">En Emisión</option>
                                <option value="finalizado">Finalizado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" id="cardContainer">
                    <?php foreach ($animes as $anime) { ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mt-4 cardContainer">
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
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const cardContainer = document.getElementById('cardContainer');
                const paginationElement = document.getElementById('pagination');

                const pagination = new Pagination(cardContainer, paginationElement, {
                    cardsPerPage: 16
                });
                pagination.init();
            });
        </script>
    </body>
