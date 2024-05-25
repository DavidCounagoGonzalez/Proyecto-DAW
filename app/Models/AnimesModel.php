<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class AnimesModel extends \Com\Daw2\Core\BaseModel {
    
    private const SELECT_FROM = "SELECT a.* FROM Animes a ORDER BY a.titulo";
    
    function getAll(): array{
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }
    
    function loadById(int $id): ?array{
        $query = "SELECT a.* FROM Animes a WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        
        if($row = $stmt->fetch()){
            return $row;
        }else{
            return null;
        }
    }
    
    function insertAnime(array $datos){
        $query = "INSERT INTO `Animes`(`id`, `titulo`, `episodios`, `en_emision`, `fecha_emision`, `calificacion`, `puntuacion`, `descripcion`, `transmision`, `imagenes`, `trailer`)"
                . " VALUES (:id, :titulo, :episodios, :en_emision, :fecha_emision, :calificacion, :puntuacion, :descripcion, :transmision, :imagenes, :trailer)";
        
        $stmt = $this->pdo->prepare($query);
        
        $data = array(
            'id' => $datos['id'],
            'titulo' => $datos['titulo'],
            'episodios' => $datos['episodios'],
            'en_emision' => $datos['en_emision'],
            'fecha_emision' => $datos['fecha_emision'],
            'calificacion' => $datos['calificacion'],
            'puntuacion' => $datos['puntuacion'],
            'transmision' => $datos['dia'] . ' a las ' . $datos['hora'],
            'imagenes' => '/assets/img/' . $datos['fileImg'],
            'trailer' => $datos['trailer']
        );
        
        if($stmt->execute($data)){
            return $this->pdo->lastInsertId();
        }else{
            return 0;
        }
    }
    
}

