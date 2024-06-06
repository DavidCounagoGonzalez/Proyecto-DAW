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

        if (isset($_SESSION['mensaje'])) {
            $data['mensaje'] = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

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
        $modeloAnimeGeneros = new \Com\Daw2\Models\AnimeGenerosModel();

        $errores = $this->checkForm($_POST);
        if (count($errores) > 0) {
            $data = array(
                'título' => 'Añadir Anime',
                'seccion' => '/animes',
                'generos' => $modeloGeneros->getAll(),
                'input' => filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS),
                'errores' => $errores
            );
            $this->view->showViews(array('admin/add.animes.view.php'), $data);
        } else {

            do {
                $id = $this->generateRandomId();
            } while ($modelo->loadById($id));

            if ($modelo->insertAnime($id, $_POST, $_FILES['imagenAnime'])) {
                if ($modeloAnimeGeneros->insertGenres($_POST['generos'], $id)) {
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

    function checkForm(array $post) {
        $errores = [];
        if (empty($post['titulo'])) {
            $errores['titulo'] = 'Debe indicar un título';
        }

        if (empty($post['episodios'])) {
            $errores['episodios'] = 'No puede estar vacío';
        } else if ($post['episodios'] < 1) {
            $errores['episodios'] = 'Debe tener mínimo un episodio';
        }

        if (empty($post['calificacion'])) {
            $errores['calificacion'] = 'No puede estar vacío';
        } else if (!in_array($post['calificacion'], array('TP', '12', '16', '18'))) {
            $errores['calificacion'] = 'Error de valores';
        }

        if (empty($post['fecha_emision'])) {
            $errores['fecha_emision'] = 'No puede estar vacío';
        }

        if (empty($post['generos'])) {
            $errores['generos'] = 'Debe escoger al menos un género';
        }

        if (isset($_POST['en_emision'])) {
            $_POST['en_emision'] = 1;
        } else {
            $_POST['en_emision'] = 0;
        }

        if (empty($post['puntuacion'])) {
            $errores['puntuacion'] = 'No puede estar vacío';
        } else if ($post['puntuacion'] < 0) {
            $errores['puntuacion'] = 'Debe tener mínimo un episodio';
        } else if ($post['puntuacion'] > 10) {
            $errores['puntuacion'] = 'Debe ser menor de 10';
        }

        if (!preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $post['trailer']) && !empty($post['trailer'])) {
            $errores['trailer'] = 'Debe indicar el formato completo de la url';
        }

        if (empty($post['sinopsis'])) {
            $errores['sinopsis'] = 'No puede estar vacío';
        }

        if ($_FILES['imagenAnime']['name'] != '') {
            $guardar = new \Com\Daw2\Models\SubirArchivos();

            if (!$guardar->guardar('assets/img/animeImgs/', $_FILES['imagenAnime'])) {
                $errores['imagen'] = 'Ha habido un error al subir la imagen';
            }
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

            if (!preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $input['imagenes'])) {
                $input['imagenes'] = '/assets/img/animeImgs/' . $input['imagenes'];
            }

            $data = array(
                'título' => 'Editar Anime',
                'seccion' => '/animes',
                'generos' => $modelGeneros->getAll(),
                'input' => $input,
                'animeGeneros' => $modelAnimeGeneros->getByAnime($id)
            );

            $this->view->showViews(array('admin/add.animes.view.php'), $data);
        }
    }

    public function processEdit(int $id) {
        $modelo = new \Com\Daw2\Models\AnimesModel();
        $modelGeneros = new \Com\Daw2\Models\GenerosModel();
        $modelAnimeGeneros = new \Com\Daw2\Models\AnimeGenerosModel();

        $input = $modelo->loadById($id);

        $errores = $this->checkForm($_POST);

        if (is_null($input)) {
            header('location: /admin/animes');
        } else if (count($errores) > 0) {

            var_dump($errores['imagen']);
            die;

            if (!preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $input['imagenes'])) {
                $input['imagenes'] = '/assets/img/animeImgs/' . $input['imagenes'];
            }

            $data = array(
                'título' => 'Editar Anime',
                'seccion' => '/animes',
                'generos' => $modelGeneros->getAll(),
                'input' => $input,
                'animeGeneros' => $modelAnimeGeneros->getByAnime($id),
                'errores' => $errores
            );

            $this->view->showViews(array('admin/add.animes.view.php'), $data);
        } else {

            if (empty($_FILES['imagenAnime']['name'])) {
                $_FILES['imagenAnime']['name'] = $input['imagenes'];
            }

            if ($modelo->updateAnime($id, $_POST, $_FILES['imagenAnime'])) {
                $modelAnimeGeneros->deleteById($id);
                if ($modelAnimeGeneros->insertGenres($_POST['generos'], $id)) {
                    header('location: /admin/animes');
                }
            } else {
                $data = array(
                    'título' => 'Añadir Anime',
                    'seccion' => '/animes',
                    'generos' => $modelGeneros->getAll(),
                    'input' => filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS)
                );
                $this->view->showViews(array('admin/add.animes.view.php'), $data);
            }
        }
    }

    function processDelete(int $id) {
        $modelo = new \Com\Daw2\Models\AnimesModel();
        if ($modelo->deleteAnime($id)) {
            $_SESSION['mensaje'] = array(
                'class' => 'success',
                'texto' => 'Elemento eliminado con éxito.'
            );
        } else {
            $_SESSION['mensaje'] = array(
                'class' => 'danger',
                'texto' => 'No se pudo eliminar el elemento.'
            );
        }
        header('location: /admin/animes');
    }

    function generateRandomId($length = 6) {
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;
        return mt_rand($min, $max);
    }
}
