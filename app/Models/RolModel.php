<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class RolModel extends \Com\Daw2\Core\BaseModel {
    
    private const SELECT_FROM = "SELECT * FROM roles";
    
    function getAll(): array{
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }
    
    function loadRol(int $id): ?array {
        $stmt = $this->pdo->prepare(self::SELECT_FROM . ' WHERE id_rol = ?');
        $stmt->execute([$id]);
        if($row = $stmt->fetch()){
            return $row;
        }
        else {
            return null;
        }
    }
    
}
