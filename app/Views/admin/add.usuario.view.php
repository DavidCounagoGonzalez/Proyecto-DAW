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
                                <h2 class="title"><?php echo $título ?></h2>
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label for="nombre">Nombre de Usuario</label>
                                                <input id="nombre" name='nombre' type="text" class="form-control" placeholder="Nombre de usuario" value="<?php echo $input['nombre'] ?? '' ?>">
                                                <p class="text-danger"><?php echo isset($errores['nombre']) ? $errores['nombre'] : ''; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-md-1">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id='email' name="email" type="email" class="form-control" placeholder="Correo Electrónico" value="<?php echo $input['email'] ?? '' ?>">
                                                <p class="text-danger"><?php echo isset($errores['email']) ? $errores['email'] : ''; ?></p>
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-2 pl-md-20 align-items-center">
                                            <div class="form-group">
                                                <label for="rol">Rol</label>
                                                <select class="form-control" id="roles" name="roles">
                                                    <?php foreach($roles as $rol){ ?>
                                                    <option value='<?php echo $rol['id_rol'] ?>' > <?php echo $rol['nombre_rol'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <p class="text-danger"><?php echo isset($errores['rol']) ? $errores['rol'] : ''; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-md-1">
                                                <div class="form-group">
                                                    <label for="fecha_emision">Fecha de emisión</label>
                                                    <input id='fecha_emision' name="fecha_emision" type="text" class="form-control" placeholder="Desde - Hasta" value="<?php echo $input['fecha_emision'] ?? '' ?>">
                                                    <p class="text-danger"><?php echo isset($errores['fecha_emision']) ? $errores['fecha_emision'] : ''; ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-3 pr-md-1">
                                                <div class="form-group">
                                                    <label for="calificacion">Calificación</label>
                                                    <select class="form-control selectCustom" id="calificacion" name="calificacion">
                                                        <option value="TP">Todos los públicos</option>
                                                        <option value="12">+12</option>
                                                        <option value="16">+16</option>
                                                        <option value="18">+18</option>
                                                    </select>
                                                    <p class="text-danger"><?php echo isset($errores['calificacion']) ? $errores['calificacion'] : ''; ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="selectGeneros">Géneros</label>
                                                    <select class="form-control selectGeneros custom-select" id="selectGeneros" name="generos[]" multiple>
                                                        <?php
                                                        foreach ($generos as $genero) {
                                                            ?>
                                                            <option value="<?php echo $genero['id'] ?>"
                                                            <?php
                                                            if (isset($animeGeneros)) {
                                                                foreach ($animeGeneros as $ag) {
                                                                    echo (isset($ag['genero_id']) && $ag['genero_id'] == $genero['id']) ? 'selected' : '';
                                                                }
                                                            }
                                                            ?>>
                                                            <?php echo $genero['genero'] ?>
                                                            </option>
    <?php }
?>
                                                    </select>
                                                    <p class="text-danger"><?php echo isset($errores['generos']) ? $errores['generos'] : ''; ?></p>
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
                                                    <label for="selectHora">Hora</label>
                                                    <input type="time" class="form-control" id="timePicker" name="hora">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="puntuacion">Puntuación</label>
                                                    <input id="puntuacion" name='puntuacion' type="number" class="form-control" placeholder="Home Address" value="<?php echo $input['puntuacion'] ?? '0.00' ?>" step=".01">
                                                    <p class="text-danger"><?php echo isset($errores['puntuacion']) ? $errores['puntuacion'] : ''; ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-md-1">
                                                <div class="form-group">
                                                    <label for="trailer">Enlace al trailer:</label>
                                                    <input type="text" class="form-control" id="trailer" name="trailer" value='<?php echo $input['trailer'] ?? '' ?>'>
                                                    <p class="text-danger"><?php echo isset($errores['trailer']) ? $errores['trailer'] : ''; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="sinopsis">Sinopsis</label>
                                                    <textarea id="sinopsis" name="sinopsis" rows="10" cols="80" class="form-control" placeholder="Sinopsis del anime"><?php echo $input['descripcion'] ?? '' ?></textarea>
                                                    <p class="text-danger"><?php echo isset($errores['sinopsis']) ? $errores['sinopsis'] : ''; ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-md-1">
                                                <div class="form-group">
                                                    <div class="input-group row justify-content-center text-center">
                                                        <label for="fileImg" class="col-12" >
                                                            <?php if (!isset($input['imagenes']) || is_null($input['imagenes'])) { ?>
                                                                <p id="fileName">Ningún archivo seleccionado</p>
                                                            <?php } else { ?>
                                                                <img id='imagen' src="<?php echo $input['imagenes'] ?>" alt='imagen'>
<?php } ?>
                                                        </label>
                                                        <button class="btn btn-primary btn-file animation-on-hover">
                                                            Subir Archivo<input accept=".jpg,.png,.jpeg" class="hidden" name="imagenAnime" type="file" id="fileImg">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-fill btn-primary">Guardar</button>
                                        </div>
                                </form>
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

                $('#fileName').empty();
                $('#fileName').append($("<img id='imagen' src='" + log + "' alt='imagen'>"));
                $('#imagen').attr('src', '/assets/img/animeImgs/' + log);
                $('#imagen').attr('alt', log);
            });
        });
    </script>
</body>


</html>
