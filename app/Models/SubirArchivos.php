<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class SubirArchivos extends \Com\Daw2\Core\BaseModel {

    function guardar(string $dir, $archivo) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $uploadFile = $dir . basename($archivo['imagenAnime']['name']);

            if ($archivo['imagenAnime']['error'] == UPLOAD_ERR_OK) {
                if (move_uploaded_file($archivo['imagenAnime']['tmp_name'], $uploadFile)) {
                    return 1;
                }
            } else {
                return 0;
            }
        }
    }
}
