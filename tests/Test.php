<?php

declare (strict_type=1);

use PHPUnit\Framework\TestCase;
use Com\Daw2\Controllers\admin\LoginController;
use Com\Daw2\Models\UsuarioModel;

class Test extends TestCase {

    private $loginController;

    protected function setUp(): void {

        $this->loginController = new LoginController();
    }

    /**
     * Comprobamos que si le pasamos datos correctos a checklogin no devuelve errores
     */
    public function testCheckLogin() {

        $data['email'] = 'juan@prueba.com';
        $data['pass'] = 'Pepe123.';

        $errores = $this->loginController->checklogin($data);

        $this->assertEmpty($errores);
        $data['email'] = '';
        $data['pass'] = '';

        $errores = $this->loginController->checklogin($data);

        $this->assertArrayHasKey('email', $errores, "Inserte un email");
        $this->assertArrayHasKey('pass', $errores, "inserte una contraseña");
    }

    /**
     * Comprobamos que el registro se hace bien añadiendo y eliminando tras esto
     */
    public function testModelUser() {
        $model = new UsuarioModel();

        $usuario = $model->loadByEmail('juan@prueba.com');

        $this->assertEquals($usuario['nombre'], 'Juan');
        $this->assertEquals($usuario['email'], 'juan@prueba.com');

        $datos = [
            'nombre' => 'pepe',
            'email' => 'pepe@prueba.com',
            'id_rol' => '2',
            'pass' => 'Pepe123.',
            'pass2' => 'Pepe123.'
        ];

        $registro = $model->insertUsuario($datos);

        $this->assertNotEquals(0, $registro);

        $delete = $model->deleteUser($registro);

        $this->assertTrue($delete);
    }
}
