<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portada Fusionada</title>
        <?php include 'templates/head.view.php' ?>
        <link rel="stylesheet" href="assets/css/usuarios/inicio.css">
    </head>
    <body>
        <div class="main-panel">
                <?php include 'templates/navbar.view.php' ?>
                <div class="wrapper wrapper-full-page">
                    <div class="contenedor">
                        <div class="texto text-center">
                            <h1>Bienvenidos a KeroAnime</h1>
                            <p>Este es un texto de ejemplo que se superpone ligeramente sobre la imagen a la derecha.</p>
                            <div class="mt-3">
                                <a class="btn btn-primary" href="/accounts/login">Acceder</a>
                            </div>
                        </div>
                        <div class="imagen">
                            <img src="/assets/img/PoratdaKeroAnime.jpg" alt="Imagen de ejemplo">
                        </div>
                    </div>
                    <div>
                        <p> Hasta aquí </p>
                    </div>
                </div>
        </div>
        <?php include 'templates/scripts.view.php' ?>
    </body>
</html>