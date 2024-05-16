<?php

namespace Com\Daw2\Controllers\admin;

class GenerosController extends \Com\Daw2\Core\BaseController {

    public function mostrarTodos() {
        
        $model = new \Com\Daw2\Models\GenerosModel();
        
        $data = array(
            'titulo' => 'Géneros',
            'seccion' => '/generos',
            'generos' => $model->getAll()
        );        

        
        $this->view->showViews(array('admin/generos.view.php'), $data);
    }

}