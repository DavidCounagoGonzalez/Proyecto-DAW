<?php

namespace Com\Daw2\Controllers\user;

class verTodosController extends \Com\Daw2\Core\BaseController {

    public function verTodos() {
        $modelAnimes = new \Com\Daw2\Models\AnimesModel();
        
        $animes = $modelAnimes->getAll();
        
        for($anime=0; $anime < count($animes); $anime++) {
            if (!preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $animes[$anime]['imagenes']) && $animes[$anime]['imagenes'] != '' ) {
                $animes[$anime]['imagenes'] = '/assets/img/animeImgs/' . $animes[$anime]['imagenes'];
            }
        }
        
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio'],
            'animes' => $animes
        ); 
        
        $this->view->showViews(array('user/verTodos.view.php'), $data);
    }

}
