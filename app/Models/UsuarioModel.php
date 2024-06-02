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
    
    function loadByEmail(string $email): ?array {
        $query = self::SELECT_FROM . " WHERE uw.email = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email]);
        if($row = $stmt->fetch()){
            return $row;
        }else{
            return null;
        }
    }
    
    function insertUsuario(array $datos){
        $query = "INSERT INTO `usuarios_web`(`id_rol`, `email`, `pass`, `nombre`) "
                . "VALUES (:id_rol,:email,:pass,:nombre)";
        $stmt = $this->pdo->prepare($query);
         
        $data = array(
            'id_rol' => (int) $datos['id_rol'],
            'email' => $datos['email'],
            'pass' => password_hash($datos['pass'], PASSWORD_DEFAULT),
            'nombre' => $datos['nombre']
        );
        
        if($stmt->execute($data)){
            return $this->pdo->lastInsertId();
        }else{
            return 0;
        }
    }
    
    function updateFoto(string $archivo, $id_usuario){
        $query = "UPDATE `usuarios_web` SET `foto` = :foto WHERE id_usuario = :id_usuario";
        
        $stmt = $this->pdo->prepare($query);
        
        $data = array(
            'foto' => $archivo,
            'id_usuario' => $id_usuario
        );
        
        return $stmt->execute($data);

    }
    
}