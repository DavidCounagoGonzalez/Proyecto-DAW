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
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label>Título</label>
                                                <input type="text" class="form-control" placeholder="Título del Anime" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-md-1">
                                            <div class="form-group">
                                                <label>Episodios</label>
                                                <input type="number" class="form-control" placeholder="Número de episodios" value="">
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-2 pl-md-20 align-items-center">
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
                                        <div class="col-md-3 pr-md-1">
                                            <div class="form-group">
                                                <label for="calificacion">Calificación</label>
                                                <select class="form-control custom-select" id="calificacion">
                                                    <option>Todos los públicos</option>
                                                    <option>+12</option>
                                                    <option>+16</option>
                                                    <option>+18</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Puntuación</label>
                                                <input type="number" class="form-control" placeholder="Home Address" value="0.00" step=".01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 pr-md-1">
                                            <div class="form-group">
                                                <label for="selectDay">Día de la semana:</label>
                                                <select class="form-control custom-select" id="selectDay" name="day">
                                                    <option value="" selected disabled>Selecciona un día</option>
                                                    <option value="lunes">Lunes</option>
                                                    <option value="martes">Martes</option>
                                                    <option value="miércoles">Miércoles</option>
                                                    <option value="jueves">Jueves</option>
                                                    <option value="viernes">Viernes</option>
                                                    <option value="sábado">Sábado</option>
                                                    <option value="domingo">Domingo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 px-md-1">
                                            <div class="form-group">
                                                <label for="selectTime">Hora:</label>
                                                <input type="time" class="form-control" id="selectTime" name="time">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-md-1">
                                            <div class="form-group">
                                                <label for="subirImagen">Subir imagen:</label>
                                                <input type="file" class="form-control" id="subirImagen" name="file" accept="image/*" multiple>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-md-1">
                                            <div class="form-group">
                                                <label for="trailer">Enlace al trailer:</label>
                                                <input type="text" class="form-control" id="trailer" name="trailer">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Sinopsis</label>
                                                <textarea rows="4" cols="80" class="form-control" placeholder="Sinopsis del anime"></textarea>
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