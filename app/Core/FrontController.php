<?php

namespace Com\Daw2\Core;

use Steampixel\Route;

class FrontController {

    static function main() {

        Route::add('/',
                function () {
                    $controlador = new \Com\Daw2\Controllers\user\InicioController();
                    $controlador->index();
                }
                , 'get');

        if (!isset($_SESSION['usuario'])) {
            Route::add('/accounts/login',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\LoginController();
                        $controlador->mostrarLogin();
                    }
                    , 'get');

            Route::add('/accounts/login',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\LoginController();
                        $controlador->processLogin();
                    }
                    , 'post');

            Route::add('/accounts/register',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\LoginController();
                        $controlador->mostrarRegistro();
                    }
                    , 'get');
                    
            Route::add('/accounts/register',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\LoginController();
                        $controlador->processRegistro();
                    }
                    , 'post');

            Route::pathNotFound(
                    function () {
                        header('location: /accounts/login');
                    }
            );
        } else {

            if($_SESSION['usuario']['id_rol'] == 1){
            Route::add('/admin',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\AdminInicioController();
                        $controlador->index();
                    }
                    , 'get');

            Route::add('/admin/animes',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\AnimesController();
                        $controlador->mostrarTodos();
                    }
                    , 'get');

            Route::add('/admin/animes/add',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\AnimesController();
                        $controlador->mostrarAdd();
                    }
                    , 'get');

            Route::add('/admin/animes/add',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\AnimesController();
                        $controlador->processAdd();
                    }
                    , 'post');

            Route::add('/admin/animes/edit/([0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\admin\AnimesController();
                        $controlador->mostrarEdit($id);
                    }
                    , 'get');

            Route::add('/admin/animes/edit/([0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\admin\AnimesController();
                        $controlador->processEdit($id);
                    }
                    , 'post');

            Route::add('/admin/animes/delete/([0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\admin\AnimesController();
                        $controlador->processDelete($id);
                    }
                    , 'get');

            Route::add('/admin/generos',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\GenerosController();
                        $controlador->mostrarTodos();
                    }
                    , 'get');

            Route::add('/admin/usuarios',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\UsuarioController();
                        $controlador->mostrarTodos();
                    }
                    , 'get');

            Route::add('/admin/usuarios/add',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\UsuarioController();
                        $controlador->mostrarAdd();
                    }
                    , 'get');

            Route::add('/admin/usuarios/add',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\UsuarioController();
                        $controlador->processAdd();
                    }
                    , 'post');

            Route::add('/admin/usuarios/edit/([0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\admin\UsuarioController();
                        $controlador->mostrarEdit($id);
                    }
                    , 'get');

            Route::add('/admin/usuarios/edit/([0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\admin\UsuarioController();
                        $controlador->processEdit($id);
                    }
                    , 'post');
                    
            Route::add('/admin/usuarios/delete/([0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\admin\UsuarioController();
                        $controlador->processDelete($id);
                    }
                    , 'get');

            Route::add('/actualiza',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\CargarAnimesModel();
                        $controlador->apiAnimes();
                    }
                    , 'get');
            }else{

                Route::add('/admin/([A-Za-z0-9]+)',
                    function () {
                        header('location: /');
                    });
            }
            
            Route::add('/verTodos',
                function () {
                    $controlador = new \Com\Daw2\Controllers\user\verTodosController();
                    $controlador->verTodos();
                }
                , 'get');

            Route::add('/accounts/logout',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\admin\LoginController();
                        $controlador->logout();
                    }
            );

            Route::add('/accounts/login',
                    function () {
                        header('location: /');
                    });

            Route::add('/accounts/register',
                    function () {
                        header('location: /');
                    });
                    
            Route::add('/agregarLista',
                function () {
                    $controlador = new \Com\Daw2\Controllers\user\ListasAnimesController();
                    $controlador->processInsert();
                }
                , 'post');
                    
            Route::pathNotFound(
                    function () {
                        $controller = new \Com\Daw2\Controllers\ErroresController();
                        $controller->error404();
                    }
            );

            Route::methodNotAllowed(
                    function () {
                        $controller = new \Com\Daw2\Controllers\ErroresController();
                        $controller->error405();
                    }
            );
        }
        Route::run();
    }
}
