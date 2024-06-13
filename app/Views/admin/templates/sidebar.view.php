<div class="sidebar">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-normal text-center">
            Gestiones
          </a>
        </div>
        <ul class="nav">
          <li class="<?php echo isset($seccion) && $seccion === '/' ? 'active' : '' ?>">
            <a href="/admin">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Inicio</p>
            </a>
          </li>
          <li class="<?php echo isset($seccion) && $seccion === '/animes' ? 'active' : '' ?>">
            <a href="/admin/animes">
              <i class="tim-icons icon-app"></i>
              <p>Animes</p>
            </a>
          </li>
          <li class="<?php echo isset($seccion) && $seccion === '/generos' ? 'active' : '' ?>">
            <a href="/admin/generos">
              <i class="tim-icons icon-paper"></i>
              <p>Géneros</p>
            </a>
          </li>
          <li class="<?php echo isset($seccion) && $seccion === '/usuarios' ? 'active' : '' ?>">
            <a href="/admin/usuarios">
              <i class="tim-icons icon-single-02"></i>
              <p>Usuarios</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
