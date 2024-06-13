<?php

declare(strict_types=1);

/*
 * Este Modelo recoge los datos desde la API pero ha de indicarse las páginas para recogerlos poco a poco,
 * se lanza en la ruta /actualiza, recomiendo no usarlo debido a que podría dar error por los ids.
 * Esto se puede controlar en env, por defecto viene en true para que no pueda añadir y redirija al incio.
 */

namespace Com\Daw2\Models;

//Obtener datos de la API
class CargarAnimesModel extends \Com\Daw2\Core\BaseModel {

    function apiAnimes() {
        if ($_ENV['db.llena'] === "false") {
            for ($p = 5; $p <= 9; $p++) {

                $url = "https://api.jikan.moe/v4/anime?sfw=true&page={$p}";
                $datos = file_get_contents($url);
                $datos = json_decode($datos, true);

                $stmt = $this->pdo->prepare("INSERT INTO Animes (id, titulo, episodios, en_emision, fecha_emision, calificacion, puntuacion, descripcion, imagenes, trailer)"
                        . " VALUES (:id, :titulo, :episodios, :en_emision, :fecha_emision, :calificacion, :puntuacion, :descripcion, :imagenes, :trailer)");

                foreach ($datos['data'] as $dato) {
                    var_dump($dato['title']);

                    if ($dato['airing'] === false) {
                        $airing = 0;
                    } else {
                        $airing = 1;
                    }

                    $data = [
                        'id' => $dato['mal_id'],
                        'titulo' => $dato['title'],
                        'episodios' => $dato['episodes'],
                        'en_emision' => $airing,
                        'fecha_emision' => $dato['aired']['string'],
                        'calificacion' => $dato['rating'],
                        'puntuacion' => $dato['score'],
                        'descripcion' => $dato['synopsis'],
                        'imagenes' => $dato['images']['jpg']['image_url'],
                        'trailer' => $dato['trailer']['url']
                    ];

                    $stmt->execute($data);
                }
            }
            return 'Lo ha logrado señor';
        }else{
        header('location: /');
        }
    }
}
?>



