<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class AnimeGenerosModel extends \Com\Daw2\Core\BaseModel {
    
    //recoge los generos de un anime
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
    
    //Añade los géneros a un anime
    function insertGenres($generos, $id_anime) {
        $query = "INSERT INTO `genero_anime`(`genero_id`, `anime_id`) VALUES (:genero_id, :id_anime)";

        $stmt = $this->pdo->prepare($query);

        foreach ($generos as $genero) {
            $vars = array(
                'genero_id' => $genero,
                'id_anime' => $id_anime
            );

            if (!$stmt->execute($vars)) {
                return 0;
            }
        }
        return 1;
    }
    
    function deleteById($id){
        $query = "DELETE FROM `genero_anime` WHERE `anime_id` = ?";
        
        $stmt = $this->pdo->prepare($query);
        
        if($stmt->execute([$id])){
            return 1;
        }else{
            return 0;
        }
    }
}
