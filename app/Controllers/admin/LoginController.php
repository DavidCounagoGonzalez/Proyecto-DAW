<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers\admin;

class LoginController extends \Com\Daw2\Core\BaseController {

    function mostrarLogin() {
        if (isset($_SESSION['usuario'])) {
            header('location: /');
        } else {
            $this->view->show('admin/login.view.php');
        }
    }

    function processLogin() {
        $errores = $this->checklogin($_POST);
        if (count($errores) == 0) {
            $modelo = new \Com\Daw2\Models\UsuarioModel();
            $usuario = $modelo->loadByEmail(trim($_POST['email']));
            if (!is_null($usuario)) {
                if (password_verify($_POST['pass'], $usuario['pass'])) {
                    unset($usuario['pass']);
                    $modelo->ultimoInicio($usuario['id_usuario']);
                    $_SESSION['usuario'] = $usuario;
                    header('location: /');
                } else {
                    $errores['pass'] = 'Datos de acceso incorrectos';
                }
            } else {
                $errores['pass'] = 'Datos de acceso incorrectos';
            }
        }
        $data = array(
            'errores' => $errores,
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS),
        );

        $this->view->show('admin/login.view.php', $data);
    }

    function checklogin(array $post): array {
        $errores = [];
        if (empty($post['email'])) {
            $errores['email'] = "Inserte un email";
        }
        if (empty($post['pass'])) {
            $errores['pass'] = "inserte una contraseña";
        }
        return $errores;
    }

    function mostrarRegistro() {
        if (isset($_SESSION['usuario'])) {
            header('location: /');
        } else {
            $this->view->show('admin/register.view.php');
        }
    }

    function ProcessRegistro() {
        $errores = $this->checkRegister($_POST);

        if (count($errores) == 0) {
            
        }
    }

    function checkRegister(array $post): array {
        $errores = [];
        if (empty($post['nombre'])) {
            $errores['nombre'] = 'Debes indicar un nombre de Usuario';
        }

        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'Debes indicar un correo válido';
        } else {
            $model = new \Com\Daw2\Models\UsuarioModel();
            $usuario = $model->loadByEmail($post['email']);
            if (!is_null($usuario)) {
                $errores['email'] = 'El email introducido está en uso.';
            }
        }

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $post['pass'])) {
            $errores['pass'] = 'La contraseña debe contener al menos una mayúscula, una minúscula, un número y como mínimo 8 caracteres.';
        } else if ($post['pass'] != $post['pass2']) {
            $errores['pass2'] = 'Las contraseñas no coinciden';
        }
        return $errores;
    }

    function logout() {
        if (session_destroy()) {
            header('location: /login');
        }
    }
}
