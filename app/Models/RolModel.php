<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class RolModel extends \Com\Daw2\Core\BaseModel {
    
    private const SELECT_FROM = "SELECT * FROM roles";
    
    function getAll(): array{
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }
    
}
