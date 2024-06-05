<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers\admin;

class UsuarioController extends \Com\Daw2\Core\BaseController {

    function mostrarTodos() {
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

    function processAdd() {
        $rolModel = new \Com\Daw2\Models\RolModel();
        $modelo = new \Com\Daw2\Models\UsuarioModel();

        $errores = $this->checkInsert($_POST);

        if (count($errores) > 0) {
            $data = array(
                'título' => 'Añadir Usuario',
                'seccion' => '/usuarios',
                'roles' => $rolModel->getAll(),
                'input' => filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS),
                'errores' => $errores
            );
            $this->view->showViews(array('admin/add.usuario.view.php'), $data);
        } else {
            if ($id_user = $modelo->insertUsuario($_POST)) {
                $guardar = new \Com\Daw2\Models\SubirArchivos();
                $_FILES['fotoPerfil']['name'] = $id_user . '.jpg';

                $guardar->guardar('assets/img/FotosPerfil/', $_FILES['fotoPerfil']);
                if ($modelo->updateFoto($_FILES['fotoPerfil']['name'], $id_user)) {
                    header('location: /admin/usuarios');
                }
            } else {
                $data = array(
                    'título' => 'Añadir Usuario',
                    'seccion' => '/usuarios',
                    'roles' => $rolModel->getAll(),
                    'input' => filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS)
                );
                $this->view->showViews(array('admin/add.usuario.view.php'), $data);
            }
        }
    }

    public function mostrarEdit(int $id) {

        $rolModel = new \Com\Daw2\Models\RolModel();

        $model = new \Com\Daw2\Models\UsuarioModel();

        $data = array(
            'título' => 'Editar Usuario',
            'seccion' => '/usuarios',
            'roles' => $rolModel->getAll(),
            'input' => $model->getById($id)
        );

        $this->view->showViews(array('admin/add.usuario.view.php'), $data);
    }

    public function processEdit(int $id_user) {
        $rolModel = new \Com\Daw2\Models\RolModel();
        $model = new \Com\Daw2\Models\UsuarioModel();

        $errores = $this->checkEdit($_POST, $id_user);

        if (count($errores) > 0) {

            $data = array(
                'título' => 'Editar Usuario',
                'seccion' => '/usuarios',
                'roles' => $rolModel->getAll(),
                'input' => $model->getById($id_user),
                'errores' => $errores
            );
            $this->view->showViews(array('admin/add.usuario.view.php'), $data);
        } else {
            if ($model->updateUsuario($_POST, $id_user)) {
                $guardar = new \Com\Daw2\Models\SubirArchivos();
                $_FILES['fotoPerfil']['name'] = $id_user . '.jpg';

                $guardar->guardar('assets/img/FotosPerfil/', $_FILES['fotoPerfil']);
                if ($model->updateFoto($_FILES['fotoPerfil']['name'], $id_user)) {
                    header('location: /admin/usuarios');
                }
            } else {
                $data = array(
                    'título' => 'Añadir Usuario',
                    'seccion' => '/usuarios',
                    'roles' => $rolModel->getAll(),
                    'input' => filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS)
                );
                $this->view->showViews(array('admin/add.usuario.view.php'), $data);
            }
        }
    }

    private function checkInsert(array $post) {
        $errores = $this->checkform($post);

        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'Debes indicar un correo válido';
        } else {
            $model = new \Com\Daw2\Models\UsuarioModel();
            $usuario = $model->loadByEmail($post['email']);
            if (!is_null($usuario)) {
                $errores['email'] = 'El email introducido está en uso.';
            }
        }
        return $errores;
    }

    private function checkEdit(array $post, int $id) {
        $errores = $this->checkform($post);

        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'Debes indicar un correo válido';
        } else {
            $model = new \Com\Daw2\Models\UsuarioModel();
            $usuario = $model->loadEditEmail($post['email'], $id);

            if (!is_null($usuario)) {
                $errores['email'] = 'El email introducido está en uso';
            }
        }
        return $errores;
    }

    private function checkform(array $post) {
        $errores = [];

        if (empty($post['nombre'])) {
            $errores['nombre'] = 'Debes indicar un nombre de Usuario';
        }

        if (empty($post['id_rol'])) {
            $errores['id_rol'] = "Selecciona una opción válida";
        } else {
            $rolModel = new \Com\Daw2\Models\RolModel();
            if (!filter_var($post['id_rol'], FILTER_VALIDATE_INT) || is_null($rolModel->loadRol((int) $post['id_rol']))) {
                $errores['id_rol'] = 'Valor incorrecto';
            }
        }

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $post['pass'])) {
            $errores['pass'] = 'La contraseña debe contener al menos una mayúscula, una minúscula, un número y como mínimo 8 caracteres.';
        } else if ($post['pass'] != $post['pass2']) {
            $errores['pass2'] = 'Las contraseñas no coinciden';
        }

        return $errores;
    }
}
