<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'templates/head.view.php' ?>
        <link href="/assets/css/login.css" rel="stylesheet" /> 
    </head>

    <body class="">
        <div class="main-panel ps">
            <?php include 'templates/accountsNav.view.php' ?>
            <div class="wrapper wrapper-full-page">
                <div class="full-page login-page">
                    <div class="content">
                        <div class="container">
                            <div class="col-10 col-md-8 col-lg-6 ml-auto mr-auto">
                                <form method="post" class="form">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="image-container">
                                                <img src="/assets/img/chopperLogin.png" id="grande">
                                            </div>
                                            <div class="text-overlay text-center">
                                                <img src="/assets/img/LogoKeroAnimeTextR.png"/>
                                                <h2>Log In</h2>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" class="form-control" placeholder="Correo electrónico" required id="email" value="<?php echo isset($email)? $email : '' ?> ">
                                                <p class="text-danger"><?php echo isset($errores['email']) ? $errores['email'] : ''; ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="pass">Contraseña</label>
                                                <input type="password" name="pass" class="form-control" placeholder="Contraseña" required id="pass">
                                                <p class="text-danger"><?php echo isset($errores['pass']) ? $errores['pass'] : ''; ?></p>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block mb-3" >Iniciar Sesión</button>
                                            <div class="pull-left">
                                                <h6><a href="/accounts/register" class="link link-footer">Registrarse</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php include 'templates/footer.view.php' ?>
                </div>
            </div>
        </div>
        <?php include 'templates/scripts.view.php' ?>
    </body>

</html>

