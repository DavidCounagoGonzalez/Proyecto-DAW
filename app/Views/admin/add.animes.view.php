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
                                <h2 class="title">Añadir Anime</h2>
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label for="titulo">Título</label>
                                                <input id="titulo" name='titulo' type="text" class="form-control" placeholder="Título del Anime" value="<?php echo $input['titulo'] ?? '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-md-1">
                                            <div class="form-group">
                                                <label for="episodios">Episodios</label>
                                                <input id='episodios' name="episodios" type="number" class="form-control" placeholder="Número de episodios" value="<?php echo $input['episodios'] ?? '' ?>">
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-2 pl-md-20 align-items-center">
                                            <div class="form-check">
                                                <label for="en_emision" class="form-check-label">
                                                    <input id="en_emision" name='en_emision' class="form-check-input" type="checkbox" <?php echo (isset($input['en_emision']) && $input['en_emision'] == 1) ? 'checked' : '' ?>>
                                                    En emisión
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-md-1">
                                            <div class="form-group">
                                                <label for="fecha_emision">Fecha de emisión</label>
                                                <input id='fecha_emision' name="fecha_emision" type="text" class="form-control" placeholder="Desde - Hasta" value="<?php echo $input['fecha_emision'] ?? '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3 pr-md-1">
                                            <div class="form-group">
                                                <label for="calificacion">Calificación</label>
                                                <select class="form-control selectCustom" id="calificacion" name="calificacion">
                                                    <option>Todos los públicos</option>
                                                    <option>+12</option>
                                                    <option>+16</option>
                                                    <option>+18</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="selectGeneros">Géneros</label>
                                                <select class="form-control selectGeneros custom-select" id="selectGeneros" name="generos[]" multiple>
                                                    <?php
                                                    foreach ($generos as $genero) {
                                                        ?>
                                                        <option value="<?php echo $genero['id'] ?>"><?php echo $genero['genero'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 pr-md-1">
                                            <div class="form-group">
                                                <label for="selectDia">Día trasmisión</label>
                                                <select class="form-control selectCustom" id="selectDia" name="dia">
                                                    <option value="" selected>--------</option>
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
                                        <div class="col-md-3 px-md-1">
                                            <div class="form-group">
                                                <div class="time-picker-container">
                                                    <label for="selectHora">Hora</label>
                                                    <input type="time" class="time-picker form-control" id="selectHora" name="hora">
                                                    <div class="time-picker-dropdown" id='timeDropdown'>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="puntuacion">Puntuación</label>
                                                <input id="puntuacion" name='puntuacion' type="number" class="form-control" placeholder="Home Address" value="<?php echo $input['puntuacion'] ?? '0.00' ?>" step=".01">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-md-1">
                                            <div class="form-group">
                                                <label for="trailer">Enlace al trailer:</label>
                                                <input type="text" class="form-control" id="trailer" name="trailer" value='<?php echo $input['trailer'] ?? '' ?>'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="sinopsis">Sinopsis</label>
                                                <textarea id="sinopsis" name="sinopsis" rows="10" cols="80" class="form-control" placeholder="Sinopsis del anime"><?php echo $input['descripcion'] ?? '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-md-1">
                                            <div class="form-group">
                                                <div class="input-group row justify-content-center text-center">
                                                    <label for="fileImg" class="col-12" >
                                                        <?php if (!isset($input['imagenes']) || is_null($input['imagenes'])) { ?>
                                                            <p id="fileName">Ningún archivo seleccionado</p>
                                                        <?php } else { ?>
                                                            <img src="<?php echo $input['imagenes'] ?>" alt='imagen'>
                                                        <?php } ?>
                                                    </label>
                                                    <button class="btn btn-primary btn-file animation-on-hover">
                                                        Subir Archivo<input accept=".jpg,.png,.jpeg" class="hidden" name="fileImg" type="file" id="fileImg">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary">Guardar</button>
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
    <script>
        $(document).ready(function () {
            $('#fileImg').on('change', function (event) {
                var input = $(this);
                var numFiles = input.get(0).files ? input.get(0).files.length : 1;
                var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                var log = numFiles > 1 ? numFiles + ' archivos seleccionados' : label;

                $('#fileName').text(log);
            });
        });
    </script>
</body>


</html>