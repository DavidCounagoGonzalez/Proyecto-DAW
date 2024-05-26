<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class GenerosModel extends \Com\Daw2\Core\BaseModel {

    private const SELECT_FROM = "SELECT g.* FROM generos g ORDER BY g.id";

    function getAll(): array {
        return $this->pdo->query(self::SELECT_FROM)->fetchAll();
    }

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
}
