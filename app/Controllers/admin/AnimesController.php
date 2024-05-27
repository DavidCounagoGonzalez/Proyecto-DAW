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

    public function processAdd() {
        $modelo = new \Com\Daw2\Models\AnimesModel();
        $modeloGeneros = new \Com\Daw2\Models\GenerosModel();
        
        $errores = $this->checkForm($_POST);
        if(count($errores) > 0) {
            $data = array(
                    'título' => 'Añadir Anime',
                    'seccion' => '/animes',
                    'generos' => $modeloGeneros->getAll(),
                    'input' => filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS),
                    'errores' => $errores
                );
                $this->view->showViews(array('admin/add.animes.view.php'), $data);
        }else{
            if (isset($_POST['en_emision'])) {
                $_POST['en_emision'] = true;
            } else {
                $_POST['en_emision'] = false;
            }

            do {
                $id = $this->generateRandomId();
            } while ($modelo->loadById($id));

            if ($modelo->insertAnime($id, $_POST, $_FILES['imagenAnime'])) {
                if ($modeloGeneros->insertGenres($_POST['generos'], $id)) {
                    header('location: /admin/animes');
                }
            } else {
                $data = array(
                    'título' => 'Añadir Anime',
                    'seccion' => '/animes',
                    'generos' => $modeloGeneros->getAll(),
                    'input' => filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS)
                );
                $this->view->showViews(array('admin/add.animes.view.php'), $data);
            }
        }
    }
    
    function checkForm(array $post){
        $errores = [];
        if(empty($post['titulo'])){
            $errores['titulo'] = 'Debe indicar un título';
        }
        
        if(empty($post['episodios'])){
            $errores['episodios'] = 'No puede estar vacío';
        }else if($post['episodios'] < 1){
            $errores['episodios'] = 'Debe tener mínimo un episodio';
        }
        
        if(empty($post['fecha_emision'])){
            $errores['fecha_emision'] = 'No puede estar vacío';
        }
        
        if(!isset($post['generos'])){
            $errores['generos'] = 'Debe escoger al menos un género';
        }
        
        return $errores;
    }

    public function mostrarEdit(int $id) {

        $modelo = new \Com\Daw2\Models\AnimesModel();
        $modelGeneros = new \Com\Daw2\Models\GenerosModel();
        $modelAnimeGeneros = new \Com\Daw2\Models\AnimeGenerosModel();
        
        $input = $modelo->loadById($id);

        if (is_null($input)) {
            header('location: /admin/animes');
        } else {
            $data = array(
                'titulo' => 'Editar Anime',
                'seccion' => '/animes',
                'generos' => $modelGeneros->getAll(),
                'input' => $input,
                'animeGeneros' => $modelAnimeGeneros->getByAnime($id)
            );

            $this->view->showViews(array('admin/add.animes.view.php'), $data);
        }
    }

    function generateRandomId($length = 4) {
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;
        return mt_rand($min, $max);
    }
}
