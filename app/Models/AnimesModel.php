<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class AnimesModel extends \Com\Daw2\Core\BaseModel {
    
    private const SELECT_FROM = "SELECT a.* FROM Animes a ORDER BY a.titulo";
    
    function getAll(): array{
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }
    
    //Recoge todos los animes con un campo que agrupa los ids de los generos, otro con los nombre de estos y un último con los ids de las listas.
    function getAllWithGenres($user_id): array{
        $query = "SELECT a.*, GROUP_CONCAT(DISTINCT ga.genero_id SEPARATOR ',') AS generos, GROUP_CONCAT(DISTINCT g.genero SEPARATOR ', ') AS generosStr, 
            GROUP_CONCAT(DISTINCT la.estado_id SEPARATOR ',') AS listas 
            FROM Animes a LEFT JOIN genero_anime ga ON a.id = ga.anime_id INNER JOIN generos g ON ga.genero_id = g.id LEFT JOIN (SELECT * FROM listas_anime WHERE usuario_id = ?)
            la ON a.id = la.anime_id GROUP BY a.id, a.titulo ORDER BY a.titulo";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }
    
    //Recoge 12 animes random para el inicio
    function get12Animes(): array{
        $query = "SELECT * FROM Animes ORDER BY RAND() LIMIT 12";
        
        return $this->pdo->query($query)->fetchAll();
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
        $query = "INSERT INTO `Animes`(`id`, `titulo`, `episodios`, `en_emision`, `fecha_emision`, `calificacion`, `puntuacion`, `descripcion`, `imagenes`, `trailer`)"
                . " VALUES (:id, :titulo, :episodios, :en_emision, :fecha_emision, :calificacion, :puntuacion, :descripcion, :imagenes, :trailer)";
        
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
                . " `calificacion`=:calificacion,`puntuacion`=:puntuacion,`descripcion`=:descripcion,`imagenes`=:imagenes,`trailer`=:trailer WHERE id = :id";
        
        $stmt = $this->pdo->prepare($query);
        
        $vars = array(
            'titulo' => $datos['titulo'],
            'episodios' => intval($datos['episodios']),
            'en_emision' => $datos['en_emision'],
            'fecha_emision' => $datos['fecha_emision'],
            'calificacion' => $datos['calificacion'],
            'puntuacion' => $datos['puntuacion'],
            'descripcion' => $datos['sinopsis'],
            'imagenes' => $imagen['name'],
            'trailer' => $datos['trailer'],
            'id' => $id
        );
        
        return $stmt->execute($vars);
    }
    
    function deleteAnime(int $id): bool{
        $query = "DELETE FROM `Animes` WHERE id = ?";
        
        $stmt = $this->pdo->prepare($query);
        if($stmt->execute([$id])){
            return true;
        }else{
            return false;
        }
    }
    
}

