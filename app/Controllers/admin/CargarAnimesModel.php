<?php
declare(strict_types=1);

namespace Com\Daw2\Controllers\admin;
//Obtener datos de la API
class CargarAnimesModel extends \Com\Daw2\Core\BaseModel{
    
    function apiAnimes(){
        for ($p = 5; $p <=9; $p++){
            $url = "https://api.jikan.moe/v4/anime?sfw=true&page={$p}";
            $datos = file_get_contents($url);
            $datos = json_decode($datos, true);
            
            $stmt = $this->pdo->prepare("INSERT INTO Animes (id, titulo, episodios, en_emision, fecha_emision, calificacion, puntuacion, descripcion, transmision, imagenes, trailer)"
                    . " VALUES (:id, :titulo, :episodios, :en_emision, :fecha_emision, :calificacion, :puntuacion, :descripcion, :transmision, :imagenes, :trailer)");
            
            foreach ($datos['data'] as $dato) {
                var_dump($dato['title']);
                
                if ($dato['airing'] === false){
                    $airing = 0;
                }else{
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
                    'transmision' => $dato['broadcast']['string'],
                    'imagenes' => $dato['images']['jpg']['image_url'],
                    'trailer' => $dato['trailer']['url']
                ];
                
                $stmt->execute($data);
            }
           
        }
        return 'Lo ha logrado señor';
    }
}

?>



