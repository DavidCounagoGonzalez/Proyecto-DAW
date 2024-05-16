<div class="sidebar">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
           Log
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
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
          <li class="<?php echo isset($seccion) && $seccion === '/animes' ? 'active' : '' ?>"> <!-- Tengo que hacer con class active para añadirle el puntito a la derecha -->
            <a href="/admin/animes">
              <i class="tim-icons icon-app"></i>
              <p>Animes</p>
            </a>
          </li>
          <li class="<?php echo isset($seccion) && $seccion === '/generos' ? 'active' : '' ?>"> <!-- Tengo que hacer con class active para añadirle el puntito a la derecha -->
            <a href="/admin/generos">
              <i class="tim-icons icon-paper"></i>
              <p>Géneros</p>
            </a>
          </li>
          <li class="<?php echo isset($seccion) && $seccion === '/usuarios' ? 'active' : '' ?>"> <!-- Tengo que hacer con class active para añadirle el puntito a la derecha -->
            <a href="/admin/usuarios">
              <i class="tim-icons icon-single-02"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="<?php echo isset($seccion) && $seccion === '/listas' ? 'active' : '' ?>"> <!-- Tengo que hacer con class active para añadirle el puntito a la derecha -->
            <a href="/admin/listas">
              <i class="tim-icons icon-book-bookmark"></i>
              <p>Listas</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
