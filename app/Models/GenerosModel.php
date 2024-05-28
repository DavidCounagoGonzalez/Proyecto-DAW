<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class GenerosModel extends \Com\Daw2\Core\BaseModel {

    private const SELECT_FROM = "SELECT g.* FROM generos g ORDER BY g.genero";

    function getAll(): array {
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }

    
}
