<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'templates/head.view.php' ?>
        <link href="/assets/css/paginacion.css" rel="stylesheet" />
    </head>

    <body class="">
        <div class="wrapper">
            <?php include 'templates/sidebar.view.php' ?>
            <div class="main-panel">
                <!-- Navbar -->
                <?php include 'templates/navbar.view.php' ?>
                <div class="content">
                    <div class="row">
                        <?php
                        if (isset($mensaje)) {
                            ?>
                            <div class="col-12">
                                <div class="alert alert-<?php echo $mensaje['class']; ?>">
                                    <p><?php echo $mensaje['texto']; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6 text-left">
                                            <h2 class="title">Filtros</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label for="filterTitulo">Título</label>
                                                <input id="filterTitulo" name='filterTitulo' type="text" class="form-control" placeholder="Título del Anime" value=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 align-items-center">
                                            <div class="form-check">
                                                <label for="filterEmision" class="form-check-label">
                                                    <input id="filterEmision" name='filterEmision' class="form-check-input" type="checkbox">
                                                    En emisión
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label for="filterCalificacion">Calificación</label>
                                                <select class="form-control selectCustom" id="filterCalificacion" name="filterCalificacion">
                                                    <option value="">---------</option>
                                                    <option value="TP">Todos los públicos</option>
                                                    <option value="12">+12</option>
                                                    <option value="16">+16</option>
                                                    <option value="18">+18</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6 text-left">
                                            <h2 class="title">Animes</h2>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a href="./animes/add"><button class="btn btn-fill btn-primary">Añadir</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        if (count($animes) > 0) {
                                            ?>
                                            <table class="table tablesorter " id="tabla">
                                                <thead class=" text-primary">
                                                    <tr>
                                                        <th class="display-2">
                                                            Título
                                                        </th>
                                                        <th>
                                                            En emision
                                                        </th>
                                                        <th>
                                                            Calificacion
                                                        </th>
                                                        <th>
                                                            Puntuacion
                                                        </th>
                                                        <th class="text-center">
                                                            Opciones
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    foreach ($animes as $anime) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $anime['titulo'] ?? '' ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $anime['en_emision'] ? 'Si' : 'No' ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $anime['calificacion'] ?? '' ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $anime['puntuacion'] ?? '' ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="row">
                                                                    <a href="/admin/animes/edit/<?php echo $anime['id']; ?>" class="btn btn-success btn-sm ml-1">
                                                                        <i class="fas fa-edit"></i>
                                                                        <span class="sr-only">Editar Anime</span>
                                                                    </a>
                                                                    <a href="/admin/animes/delete/<?php echo $anime['id']; ?>" class="btn btn-danger btn-sm ml-1">
                                                                        <i class="fas fa-trash"></i>
                                                                        <span class="sr-only">Eliminar Anime</span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <?php
                                        }
                                        ?>
                                        <div class="pagination" id="pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'templates/footer.view.php' ?>
            </div>
        </div>


        <script src="/assets/js/filtrosAnimes.js"></script>
        <script src="/assets/js/paginacion.js"></script>
        <?php include 'templates/scripts.view.php' ?>

    </body>

</html>