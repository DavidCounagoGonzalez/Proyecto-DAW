<?php

namespace Com\Daw2\Controllers\user;

class InicioController extends \Com\Daw2\Core\BaseController {

    public function index() {
        $modelAnimes = new \Com\Daw2\Models\AnimesModel();
        
        $animes = $modelAnimes->get12Animes();
        
        for($anime=0; $anime < count($animes); $anime++) {
            if (!preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $animes[$anime]['imagenes']) && $animes[$anime]['imagenes'] != '' ) {
                $animes[$anime]['imagenes'] = '/assets/img/animeImgs/' . $animes[$anime]['imagenes'];
            }
        }
        
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio'],
            'animesPart' => array_chunk($animes, 4)
        ); 
        
        $this->view->showViews(array('user/inicio.view.php'), $data);
    }

}
