<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers\admin;

class LoginController extends \Com\Daw2\Core\BaseController {
    
    function mostrarLogin() {
        if (isset($_SESSION['usuario'])) {
            header('location: /');
        }else{
            $this->view->show('admin/login.view.php');
        }
    }
    
}

