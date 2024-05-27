<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class AnimeGenerosModel extends \Com\Daw2\Core\BaseModel {
    
    
    function getByAnime(int $id): ?array{
        $query = "SELECT * FROM genero_anime WHERE anime_id = ?";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        
        if($row = $stmt->fetchAll()){
            return $row;
        }else{
            return null;
        }
    }
}
