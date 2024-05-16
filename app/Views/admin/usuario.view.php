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
                                <h2 class="card-title">Usuarios</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php 
                                        if(count($usuarios)>0){
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
                                                foreach($usuarios as $usuario){
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
                                                    <i class="tim-icons icon-app"></i>
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

