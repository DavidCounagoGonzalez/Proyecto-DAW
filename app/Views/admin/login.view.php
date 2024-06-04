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
                            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                                <form method="post" class="form">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="image-container">
                                                <img src="/assets/img/chopperLogin.png" class="">
                                            </div>
                                            <div class="text-overlay text-center">
                                                <img src="/assets/img/LogoKeroAnimeTextR.png"/>
                                                <h2>Log In</h2>
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

