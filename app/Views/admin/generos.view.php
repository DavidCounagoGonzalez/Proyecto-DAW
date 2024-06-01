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
                                <h2 class="card-title">Géneros</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php 
                                        if(count($generos)>0){
                                    ?>
                                    <table class="table tablesorter " id="tabla">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Géneros
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                foreach($generos as $genero){
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $genero['id'] ?? '' ?>
                                                </td>
                                                <td>
                                                    <?php echo $genero['genero'] ?? '' ?>
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
