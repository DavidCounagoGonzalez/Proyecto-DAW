<?php

namespace Com\Daw2\Controllers;

class InicioController extends \Com\Daw2\Core\BaseController {

    public function index() {
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio']
        );        

        
        $this->view->showViews(array('inicio.view.php'), $data);
    }

}
