<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class AnimesModel extends \Com\Daw2\Core\BaseModel {
    
    private const SELECT_FROM = "SELECT a.* FROM Animes a ORDER BY a.titulo";
    
    function getAll(): array{
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }
    
}

