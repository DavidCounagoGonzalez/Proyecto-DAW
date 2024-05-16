<?php

namespace Com\Daw2\Controllers\admin;

class AdminInicioController extends \Com\Daw2\Core\BaseController {

    public function index() {
        $data = array(
            'titulo' => 'Página de inicio',
            'seccion' => '/'
        );        

        
        $this->view->showViews(array('admin/admin-inicio.view.php'), $data);
    }

}
