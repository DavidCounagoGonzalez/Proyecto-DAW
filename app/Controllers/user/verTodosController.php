<?php

namespace Com\Daw2\Controllers\user;

class verTodosController extends \Com\Daw2\Core\BaseController {

    public function verTodos() {
        $modelAnimes = new \Com\Daw2\Models\AnimesModel();
        $modelGeneros = new \Com\Daw2\Models\GenerosModel();
        
        $animes = $modelAnimes->getAll();
        $animesGeneros = $modelAnimes->getAllWithGenres();
        
        for($anime=0; $anime < count($animesGeneros); $anime++) {
            if (!preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $animesGeneros[$anime]['imagenes']) && $animesGeneros[$anime]['imagenes'] != '' ) {
                $animesGeneros[$anime]['imagenes'] = '/assets/img/animeImgs/' . $animesGeneros[$anime]['imagenes'];
            }
        }
        
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio'],
            'animes' => $animes,
            'generos' => $modelGeneros->getAll(),
            'animesGeneros' => $animesGeneros
        ); 
        
        
        $this->view->showViews(array('user/verTodos.view.php'), $data);
    }

}
