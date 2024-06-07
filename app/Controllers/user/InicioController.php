<?php

namespace Com\Daw2\Controllers\user;

class InicioController extends \Com\Daw2\Core\BaseController {

    public function index() {
        
        $model = new \Com\Daw2\Models\AnimesModel();
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio'],
            'animes' => $model->getAll()
        );        

        
        $this->view->showViews(array('user/inicio.view.php'), $data);
    }

}
