<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class UsuarioModel extends \Com\Daw2\Core\BaseModel {
    
    private const SELECT_FROM = "SELECT uw.* FROM usuarios_web uw ORDER BY uw.id_usuario";
    
    function getAll(): array{
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }
    
}