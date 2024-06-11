<?php

namespace Com\Daw2\Controllers\user;

class ListasAnimesController extends \Com\Daw2\Core\BaseController {

    public function processInsert() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $estado_id = $_POST['estado_id'];
            $anime_id = $_POST['anime_id'];

            $modelo = new \Com\Daw2\Models\ListaAnimesModel();

            $data = array(
                'usuario_id' => $_SESSION['usuario']['id_usuario'],
                'anime_id' => $anime_id,
                'estado_id' => $estado_id
            );

            if ($modelo->getByData($data)) {
                $response = array('clase' => 'warning', 'mensaje' => 'El anime ya existe en esta tabla');
            } else {
                if ($modelo->insertLista($data)) {
                    $response = array('clase' => 'success', 'mensaje' => 'Anime añadido correctamente');
                } else {
                    $response = array('clase' => 'warning', 'mensaje' => 'Error al añadir el anime');
                }
            }
            echo json_encode($response);
        }
    }

    public function processBorrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $modelo = new \Com\Daw2\Models\ListaAnimesModel();

            $data = ['usuario_id' => $_SESSION['usuario']['id_usuario'],
                'anime_id' => $_POST['anime_id'],
                'estado_id' => $_POST['estado_id']
            ];

            if ($modelo->borraLista($data)) {
                $response = array('clase' => 'success', 'mensaje' => 'Anime eliminado correctamente de la lista');
            } else {
                $response = array('clase' => 'warning', 'mensaje' => 'Error al eliminar el anime de la lista');
            }

            echo json_encode($response);
        }
    }
}
