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
                                                <label for="filterNombre">Nombre</label>
                                                <input id="filterNombre" name='filterNombre' type="text" class="form-control" placeholder="Nombre usuario" value=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label for="filterEmail">Email</label>
                                                <input id="filterEmail" name='filterEmail' type="text" class="form-control" placeholder="email usuario" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6 text-left">
                                            <h2 class="title">Usuarios</h2>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a href="./usuarios/add"><button class="btn btn-fill btn-primary">Añadir</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        if (count($usuarios) > 0) {
                                            ?>
                                            <table class="table tablesorter " id="tabla">
                                                <thead class=" text-primary">
                                                    <tr>
                                                        <th>
                                                            ID
                                                        </th>
                                                        <th>
                                                            Nombre
                                                        </th>
                                                        <th>
                                                            Email
                                                        </th>
                                                        <th>
                                                            Última Conexión
                                                        </th>
                                                        <th class="text-center">
                                                            Opciones
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    foreach ($usuarios as $usuario) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $usuario['id_usuario'] ?? '' ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $usuario['nombre'] ?? '' ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $usuario['email'] ?? '' ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $usuario['last_date'] ?? '' ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="/admin/usuarios/edit/<?php echo $usuario['id_usuario']; ?>" class="btn btn-success btn-sm ml-1"><i class="fas fa-edit"></i></a>
                                                                <a href="/admin/usuarios/delete/<?php echo $usuario['id_usuario']; ?>" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></a>
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

        <script src="/assets/js/filtrosUsuarios.js"></script>
        <script src="/assets/js/paginacion.js"></script>
        <?php include 'templates/scripts.view.php' ?>

    </body>

</html>

