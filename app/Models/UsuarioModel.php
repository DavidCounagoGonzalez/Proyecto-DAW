<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class UsuarioModel extends \Com\Daw2\Core\BaseModel {
    
    private const SELECT_FROM = "SELECT uw.* FROM usuarios_web uw";
    
    function getAll(): array{
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }
    
    
    function getById(int $id) : array{
        $query = self::SELECT_FROM . " WHERE uw.id_usuario = ?";
        
        $stmt = $this->pdo->prepare($query);
        
        $stmt->execute([$id]);
        
        if($row = $stmt->fetch()){
            return $row;
        }else{
            return 0;
        }
    }
    
}