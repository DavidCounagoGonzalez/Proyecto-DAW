<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers\admin;

class UsuarioController extends \Com\Daw2\Core\BaseController {
       
  
    function mostrarTodos(){
        $data = [];
        $data['titulo'] = 'Todos los usuarios';
        $data['seccion'] = '/usuarios';
        
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $data['usuarios'] = $modelo->getAll();                
        
        $this->view->showViews(array('admin/usuario.view.php'), $data);
    }

    public function mostrarAdd() {
        
        $rolModel = new \Com\Daw2\Models\RolModel();

        $data = array(
            'título' => 'Añadir Usuario',
            'seccion' => '/usuarios',
            'roles' => $rolModel->getAll()
        );

        $this->view->showViews(array('admin/add.usuario.view.php'), $data);
    }
}