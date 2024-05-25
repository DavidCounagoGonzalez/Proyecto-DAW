<?php

namespace Com\Daw2\Controllers\admin;

class AnimesController extends \Com\Daw2\Core\BaseController {

    public function mostrarTodos() {
        
        $model = new \Com\Daw2\Models\AnimesModel();
        
        $data = array(
            'titulo' => 'Animes',
            'seccion' => '/animes',
            'animes' => $model->getAll()
        );        

        
        $this->view->showViews(array('admin/animes.view.php'), $data);
    }
    
    public function mostrarAdd() {
        
        $modelGeneros = new \Com\Daw2\Models\GenerosModel();
        
        $data = array(
            'título' => 'Añadir Anime',
            'seccion' => '/animes',
            'generos' => $modelGeneros->getAll()
        );
        

        $this->view->showViews(array('admin/add.animes.view.php'), $data);

    }
    
    public function processAdd(){
        
    }
    
    public function mostrarEdit(int $id) {
        
        $modelo = new \Com\Daw2\Models\AnimesModel();
        $input = $modelo->loadById($id);
  
        if(is_null($input)){
            header('location: /admin/animes');
        }else{
            $data = array(
                'titulo' => 'Editar Anime',
                'seccion' => '/animes',
                'input' => $input
            );
            
            $this->view->showViews(array('admin/add.animes.view.php'), $data);
        }
    }
   
   

}
