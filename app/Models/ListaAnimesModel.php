<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class ListaAnimesModel extends \Com\Daw2\Core\BaseModel {

    private const SELECT_FROM = "SELECT * FROM `listas_anime`";

    function getAll(): array {
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }
    
    //Recoge los animes,con todos sus datos, asociados con un anime y el tipo de lista deseados
    function getByUser(int $user_id, int $estado_id):array {
        $query = "SELECT a.*, GROUP_CONCAT(DISTINCT ga.genero_id SEPARATOR ',') AS generos, GROUP_CONCAT(DISTINCT g.genero SEPARATOR ', ') AS generosStr, la.estado_id
            FROM Animes a LEFT JOIN genero_anime ga ON a.id = ga.anime_id INNER JOIN generos g ON ga.genero_id = g.id LEFT JOIN listas_anime la ON a.id = la.anime_id 
            WHERE la.usuario_id = ? AND la.estado_id = ? GROUP BY a.id, a.titulo ORDER BY a.titulo";
        
        $stmt = $this->pdo->prepare($query);
        
        if($stmt->execute([$user_id, $estado_id])){
            return $stmt->fetchAll();
        }else{
            return null;
        }
        
        
    }
    
    //Sirve para comprobar que un anime ya existe en una lista
    function getByData(array $datos) :bool {
        $query = self::SELECT_FROM . " WHERE usuario_id = :usuario_id AND anime_id = :anime_id AND estado_id = :estado_id";
        
        $stmt = $this->pdo->prepare($query);
        
        $data = array(
            ':usuario_id' => $datos['usuario_id'],
            ':anime_id' => $datos['anime_id'],
            'estado_id' => $datos['estado_id']
        );
        
        $stmt->execute($data);
        if($stmt->fetch()){
            return true;
        }else{
            return false;
        }
    }
    
    function insertLista(array $datos){
        $query = "INSERT INTO `listas_anime`(`usuario_id`, `anime_id`, `estado_id`, `fecha_agregado`) VALUES (:usuario_id ,:anime_id, :estado_id, NOW())";
        
        $stmt = $this->pdo->prepare($query);
        
        $data = array(
            ':usuario_id' => $datos['usuario_id'],
            ':anime_id' => $datos['anime_id'],
            'estado_id' => $datos['estado_id']
        );
        
        if($stmt->execute($data)){
            return true;
        }else{
            return false;
        }
    }
    
    function borraLista(array $datos){
        $query = "DELETE FROM listas_anime WHERE usuario_id = :usuario_id AND anime_id = :anime_id AND estado_id = :estado_id";
        
        $stmt = $this->pdo->prepare($query);
        
        $data = array(
            ':usuario_id' => $datos['usuario_id'],
            ':anime_id' => $datos['anime_id'],
            'estado_id' => $datos['estado_id']
        );
        
        if($stmt->execute($data)){
            return true;
        }else{
            return false;
        }
    }

    
}
