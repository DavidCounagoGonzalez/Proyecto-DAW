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
                                                <select class="form-control selectCustom" id="roles" name="roles">
                                                    <?php foreach ($roles as $rol) { ?>
                                                        <option value='<?php echo $rol['id_rol'] ?>' <?php echo ($input['id_rol'] == $rol['id_rol'] ) ? 'selected' : '' ?> > <?php echo $rol['nombre_rol'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <p class="text-danger"><?php echo isset($errores['rol']) ? $errores['rol'] : ''; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="pass">Contraseña</label>
                                                    <input type="password" name="pass" id="pass" class="form-control" placeholder="8 o más caracteres">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="pass">Confirmar Contraseña</label>
                                                    <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Repite la contraseña">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-md-1">
                                                <div class="form-group">
                                                    <div class="input-group row justify-content-center text-center">
                                                        <label for="fileImg" class="col-12" >
                                                            <?php if (!isset($input['foto']) || is_null($input['foto'])) { ?>
                                                                <p id="fileName">Ningún archivo seleccionado</p>
                                                            <?php } else { ?>
                                                                <img id='foto' src="<?php echo $input['foto'] ?>" alt='foto'>
                                                            <?php } ?>
                                                        </label>
                                                        <button class="btn btn-primary btn-file animation-on-hover">
                                                            Subir Foto de Perfil<input accept=".jpg,.png,.jpeg" class="hidden" name="fotoPerfil" type="file" id="fileImg">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-fill btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </form>
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
                    $('#imagen').attr('src', '/assets/img/FotosPerfil/' + log);
                    $('#imagen').attr('alt', log);
                });
            });
        </script>
</body>


</html>
