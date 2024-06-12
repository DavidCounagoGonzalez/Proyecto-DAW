<?php

namespace Com\Daw2\Controllers\user;

class PerfilController extends \Com\Daw2\Core\BaseController {

    public function mostrarPerfil() {
        
        $modelo = new \Com\Daw2\Models\ListaAnimesModel();
        
        $favoritos = $this->urlImg($modelo->getByUser($_SESSION['usuario']['id_usuario'], 3));
        $viendo = $this->urlImg($modelo->getByUser($_SESSION['usuario']['id_usuario'], 1));
        $completados = $this->urlImg($modelo->getByUser($_SESSION['usuario']['id_usuario'], 2));
        $pendientes = $this->urlImg($modelo->getByUser($_SESSION['usuario']['id_usuario'], 4));
        
        
        $data = [
            'favoritos' =>   $favoritos,
            'viendo' =>   $viendo,
            'completados' =>   $completados,
            'pendientes' =>   $pendientes
        ];

        $this->view->showViews(array('user/perfil.view.php'), $data);
    }
    
    private function urlImg($lista){
        for($anime=0; $anime < count($lista); $anime++) {
            if (!preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $lista[$anime]['imagenes']) && $lista[$anime]['imagenes'] != '' ) {
                $lista[$anime]['imagenes'] = '/assets/img/animeImgs/' . $lista[$anime]['imagenes'];
            }
        }
        return $lista;
    }

}

