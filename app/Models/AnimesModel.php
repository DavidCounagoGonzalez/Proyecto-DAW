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

    function insertAnime(int $id, array $datos, array $imagen){
        $query = "INSERT INTO `Animes`(`id`, `titulo`, `episodios`, `en_emision`, `fecha_emision`, `calificacion`, `puntuacion`, `descripcion`, `transmision`, `imagenes`, `trailer`)"
                . " VALUES (:id, :titulo, :episodios, :en_emision, :fecha_emision, :calificacion, :puntuacion, :descripcion, :transmision, :imagenes, :trailer)";
        
        $stmt = $this->pdo->prepare($query);
        
        $data = array(
            'id' => $id,
            'titulo' => $datos['titulo'],
            'episodios' => intval($datos['episodios']),
            'en_emision' => $datos['en_emision'],
            'fecha_emision' => $datos['fecha_emision'],
            'calificacion' => $datos['calificacion'],
            'puntuacion' => $datos['puntuacion'],
            'descripcion' => $datos['sinopsis'],
            'transmision' => $datos['dia'] . ' a las ' . $datos['hora'],
            'imagenes' => $imagen['name'],
            'trailer' => $datos['trailer']
        );
        
        if($stmt->execute($data)){
            return 1;
        }else{
            return 0;
        }
    }
    
    function updateAnime(int $id, array $datos, array $imagen){
        $query = "UPDATE `Animes` SET `titulo`=:titulo,`episodios`=:episodios,`en_emision`=:en_emision,`fecha_emision`=:fecha_emision,"
                . " `calificacion`=:calificacion,`puntuacion`=:puntuacion,`descripcion`=:descripcion,`transmision`=:transmision,`imagenes`=:imagenes,`trailer`=:trailer WHERE id = :id";
        
        $stmt = $this->pdo->prepare($query);
        
        $vars = array(
            'titulo' => $datos['titulo'],
            'episodios' => intval($datos['episodios']),
            'en_emision' => $datos['en_emision'],
            'fecha_emision' => $datos['fecha_emision'],
            'calificacion' => $datos['calificacion'],
            'puntuacion' => $datos['puntuacion'],
            'descripcion' => $datos['sinopsis'],
            'transmision' => $datos['dia'] . ' a las ' . $datos['hora'],
            'imagenes' => $imagen['name'],
            'trailer' => $datos['trailer'],
            'id' => $id
        );
        
        return $stmt->execute($vars);
    }
    
}

