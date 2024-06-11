<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class ListaAnimesModel extends \Com\Daw2\Core\BaseModel {

    private const SELECT_FROM = "SELECT * FROM `listas_anime`";

    function getAll(): array {
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }
    
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
