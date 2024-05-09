<?php
declare(strict_types=1);

namespace Com\Daw2\Controllers;
//Obtener datos de la API
class AnimesModel extends \Com\Daw2\Core\BaseModel{
    
    function apiAnimes(){
        for ($p = 5; $p <=9; $p++){
            $url = "https://api.jikan.moe/v4/anime?page={$p}";
            var_dump($url);
            $datos = file_get_contents($url);
            $datos = json_decode($datos, true);
            
            $stmt = $this->pdo->prepare("INSERT INTO Animes (id, titulo, episodios, generos, en_emision, fecha_emision, calificacion, puntuacion, descripcion, transmision, imagenes, trailer)"
                    . " VALUES (:id, :titulo, :episodios, :generos, :en_emision, :fecha_emision, :calificacion, :puntuacion, :descripcion, :transmision, :imagenes, :trailer)");
            
            foreach ($datos['data'] as $dato) {
                var_dump($dato['title']);
                $generos = '';
                foreach ($dato['genres'] as $genero) {
                    $generos .= "{$genero['mal_id']}, ";
                }
                
                if ($dato['airing'] === false){
                    $airing = 0;
                }else{
                    $airing = 1;
                }
                
                $data = [
                    'id' => $dato['mal_id'],
                    'titulo' => $dato['title'],
                    'episodios' => $dato['episodes'],
                    'generos' => $generos,
                    'en_emision' => $airing,
                    'fecha_emision' => $dato['aired']['string'],
                    'calificacion' => $dato['rating'],
                    'puntuacion' => $dato['score'],
                    'descripcion' => $dato['synopsis'],
                    'transmision' => $dato['broadcast']['string'],
                    'imagenes' => $dato['images']['jpg']['image_url'] . ", " . $dato['images']['webp']['image_url'],
                    'trailer' => $dato['trailer']['url']
                ];
                
                $stmt->execute($data);
            }
           
        }
        return 'Lo ha logrado señor';
    }
}

?>



