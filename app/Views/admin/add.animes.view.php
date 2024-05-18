<?php include 'templates/head.view.php' ?>
<body class="">
    <div class="wrapper">
        <?php include 'templates/sidebar.view.php' ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include 'templates/navbar.view.php' ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="title">Añadir Anime</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label>Título</label>
                                                <input type="text" class="form-control" placeholder="Título del Anime" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 px-md-1">
                                            <div class="form-group">
                                                <label>Episodios</label>
                                                <input type="number" class="form-control" placeholder="Número de episodios" value="">
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-4 pl-md-20 align-items-center">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    En emisión
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-md-1">
                                            <div class="form-group">
                                                <label>Fecha de emisión</label>
                                                <input type="text" class="form-control" placeholder="Desde - Hasta">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-md-1">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-md-1">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" value="Mike">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-md-1">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-md-1">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'templates/footer.view.php' ?>
        </div>
    </div>
    <!--   Core JS Files   -->
    <?php include 'templates/scripts.view.php' ?>
</body>

</html>