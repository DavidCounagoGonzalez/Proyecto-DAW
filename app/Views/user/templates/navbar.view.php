<nav class="navbar navbar-expand-lg navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <h1><a class="" href="/"><img src="/assets/img/LogoKeroAnimeBG.png"></a></h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['usuario'])) { ?> 
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <div class="photo">
                                <img src="/assets/img/FotosPerfil/<?php echo $_SESSION['usuario']['foto'] ?>" alt="Profile Photo">
                            </div>
                            <b class="caret d-none d-lg-block d-xl-block"></b>
                            <p class="d-lg-none">
                                <?php echo $_SESSION['usuario']['nombre'] ?>
                            </p>
                        </a>
                        <ul class="dropdown-menu dropdown-navbar">
                            <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Perfil</a></li>
                            <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Ajustes</a></li>
                            <li class="dropdown-divider"></li>
                            <li class="nav-link"><a href="/accounts/logout" class="nav-item dropdown-item">Desconectarse</a></li>
                        </ul>
                    </li>
                    <li class="separator d-lg-none"></li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="/accounts/register" class="nav-link">
                            <i class="tim-icons icon-laptop"></i>
                            Registrarse
                        </a>
                    </li>
                    <li class="separator d-lg-none"></li>
                    <li class="nav-item">
                        <a href="/accounts/login" class="nav-link">
                            <i class="tim-icons icon-single-02"></i>
                            Login
                        </a>
                    </li>   
                <?php } ?>
            </ul>
        </div>

    </div>
</nav>