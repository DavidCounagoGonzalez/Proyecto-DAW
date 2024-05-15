<?php

namespace Com\Daw2\Controllers;

class AdminInicioController extends \Com\Daw2\Core\BaseController {

    public function index() {
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio']
        );        

        
        $this->view->showViews(array('admin/admin-inicio.view.php'), $data);
    }

}
