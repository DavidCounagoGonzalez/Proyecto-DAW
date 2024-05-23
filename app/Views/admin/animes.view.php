<?php include 'templates/head.view.php' ?>

<body class="">
    <div class="wrapper">
        <?php include 'templates/sidebar.view.php' ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include 'templates/navbar.view.php' ?>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
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
                                                             <a href="/admin/animes/edit/<?php echo $anime['id']; ?>" class="btn btn-success ml-1"><i class="fas fa-edit"></i></a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'templates/footer.view.php' ?>
        </div>
    </div>

    <?php include 'templates/scripts.view.php' ?>

</body>

</html>