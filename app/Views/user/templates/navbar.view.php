<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid text-end">
        <div class="mr-auto">
            <h1><a class="" href="/"><img src="/assets/img/LogoKeroAnimeBG.png" alt="Logo KeroAnime"></a></h1>
        </div>
        <div class="ml-auto" id="navigation">
            <ul class="navbar-nav mr-auto">
                <?php if (isset($_SESSION['usuario'])) { ?> 
                    <li class="dropdown nav-item" id='fotoPerfil'>
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <div class="photo">
                                <img src="/assets/img/FotosPerfil/<?php echo $_SESSION['usuario']['foto'] ?>" alt="Profile Photo">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-navbar">
                            <li class="nav-link"><a href="/perfil" class="nav-item dropdown-item">Perfil</a></li>
                            <li class="nav-link"><a href="/verTodos" class="nav-item dropdown-item">Animes</a></li>
                            <?php if ($_SESSION['usuario']['id_rol'] == 1) { ?> 
                                <li class="nav-link"><a href="/admin" class="nav-item dropdown-item">Administración</a></li>
                            <?php } ?>
                            <li class="nav-link"><a href="/accounts/logout" class="nav-item dropdown-item">Desconectarse</a></li>
                        </ul>
                    </li>
                    <li class="separator d-lg-none"></li>
                <?php } ?>
            </ul>
        </div>

    </div>
</nav>

