<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class AnimesModel extends \Com\Daw2\Core\BaseModel {
    
    private const SELECT_FROM = "SELECT a.* FROM Animes a ORDER BY a.titulo";
    
    function getAll(): array{
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }
    
    function loadById(): ?array{
        $query = "SELECT a.* FROM Animes a WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        
        if($row = $stmt->fetch()){
            return $row;
        }else{
            return null;
        }
    }
    
}

