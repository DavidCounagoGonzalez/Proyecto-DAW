<?php

namespace Com\Daw2\Controllers\user;

class PerfilController extends \Com\Daw2\Core\BaseController {

    public function mostrarPerfil() {
        
        if(isset($_FILES['foto'])){
            $guardar = new \Com\Daw2\Models\SubirArchivos();
            $modeloUsuario = new \Com\Daw2\Models\UsuarioModel();
            $_FILES['foto']['name'] = $_SESSION['usuario']['id_usuario'] . '.jpg';
            
            if($guardar->guardar('assets/img/FotosPerfil/', $_FILES['foto'])){
                $modeloUsuario->updateFoto($_FILES['foto']['name'], $_SESSION['usuario']['id_usuario']);
            }
        }
        
        $modelo = new \Com\Daw2\Models\ListaAnimesModel();
        //Guardo en variables distintas los animes recogidos mediante el ID de cada lista
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
    // Se usa a la vez que se recoje los animes para ver de donde se recoge la imagen
    private function urlImg($lista){
        for($anime=0; $anime < count($lista); $anime++) {
            if (!preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $lista[$anime]['imagenes']) && $lista[$anime]['imagenes'] != '' ) {
                $lista[$anime]['imagenes'] = '/assets/img/animeImgs/' . $lista[$anime]['imagenes'];
            }
        }
        return $lista;
    }

}

