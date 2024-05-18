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
                $controlador->addAnime();
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
            
        Route::add('/actualiza',
            function () {
                $controlador = new \Com\Daw2\Controllers\admin\CargarAnimesModel();
                $controlador->apiAnimes();
            }
            , 'get'); 
                                              
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
        Route::run();
    }

}
