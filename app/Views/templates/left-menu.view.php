<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/" class="nav-link active">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Inicio
                </p>
            </a>
        </li>         
        
            <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        DB
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/usuarios-sistema" class="nav-link <?php echo isset($seccion) && $seccion === '/usuarios-sistema' ? 'active' : ''; ?>">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Usuarios del Sistema</p>
                            </a>
                        </li>
                        <?php
                    
                    ?>

                </ul>
            </li>
              
    </ul>
</nav>
<!-- /.sidebar-menu -->