$(document).ready(function () {
    $('.cardContainer').on('click', '.card', function () {
        // Recojo los datos guardados en la card sobre la que se hace click
        var title = $(this).find('.card-title').text();
        var episodios = $(this).data('episodios');
        var descripcion = $(this).data('descripcion');
        var emision = $(this).data('emision');
        var generoStr = $(this).data('generos');
        

        if ($(this).data('enEmision')) {
            emision = 'En emisión desde el ' + emision;
        } else {
            emision = 'Emitido desde el ' + emision;
        }

        if ($(this).data('calificacion') === 'TP') {
            calificacion = 'todos los públicos';
        } else {
            calificacion = '+' + $(this).data('calificacion');
        }
        //Le añadimos a las etiquetas del Modal los valores recogidos
        $('#animeModalLabel').text(title);
        $('#animeCalificacion').text('Apto para ' + calificacion);
        $('#animeGeneros').text('Géneros: ' + generoStr);
        $('#animeEpisodios').text('Episodios:  ' + episodios);
        $('#animeEmision').text(emision);
        $('#animeDescripcion').text(descripcion);
        $('#animeModal').modal('show');
    });

    $('.cardContainer').on('click', '.guarda', function (event) {
        event.stopPropagation(); // Esto evita que se active la acción sobre la card que se encuentra debajo

        //Recogemos los datos del botón
        estado_id = $(this).val();
        anime_id = $(this).data('anime');
        
        //Creamos un objeto URLSearchParams que al añadir los elementos los concatena como si fuesen atributos de una URL
        var params = new URLSearchParams();
        params.append('estado_id', estado_id);
        params.append('anime_id', anime_id);

        //Enviamos por POST los datos a la url que lanza la función para agregar el anime a la lista
        fetch('/agregarLista', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: params.toString()
        })
                .then(response => response.json())
                .then(data => {
                    if (data.clase === 'success') { //Si sale bien se modifican las clases del botón para cambiar su función y color
                        $(this).removeClass('guarda');
                        $(this).addClass('borra');
                        $(this).children(0).removeClass('icon-guarda');
                        $(this).children(0).addClass('icon-borra');
                    } else {
                        alert('Error: ', data.mensaje);
                    }
                })
                .catch(error => {
                    alert('Error: ', error);
                });
    });
    
    //Lo mismo que lo anterior pero para quitar el anime desde la vista de verTodos
    $('.cardContainer').on('click', '.borra', function (event) { 
        event.stopPropagation();
        
        estado_id = $(this).val();
        anime_id = $(this).data('anime');
        
        var params = new URLSearchParams();
        params.append('estado_id', estado_id);
        params.append('anime_id', anime_id);
        
        fetch('/borrarLista', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: params.toString()
        })
                .then(response => response.json())
                .then(data => {
                    if (data.clase === 'success') {
                        $(this).removeClass('borra');
                        $(this).addClass('guarda');
                        $(this).children(0).removeClass('icon-borra');
                        $(this).children(0).addClass('icon-guarda');
                    } else {
                        alert('Error: ', data.mensaje);
                    }
                })
                .catch(error => {
                    alert('Error: ', error);
                });
    });
    
    //Este evento también lanza la función para borra de la lista al Anime , pero en este caso elimina la card ya que ocurre en la vista del perfil
    // donde las card se cargan desde el back.
    $('.cardContainer').on('click', '.eliminar', function (event) { 
        event.stopPropagation();
        
        console.log('elimina');
        
        estado_id = $(this).val();
        anime_id = $(this).data('anime');
        const cardContainer = this.closest('.cardContainer');
        
        var params = new URLSearchParams();
        params.append('estado_id', estado_id);
        params.append('anime_id', anime_id);
        
        fetch('/borrarLista', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: params.toString()
        })
                .then(response => response.json())
                .then(data => {
                    if (data.clase === 'success') {
                        console.log('Éxito: ', data.mensaje);
                        if(cardContainer){
                            cardContainer.remove();
                        }
                    } else {
                        console.log('Error: ', data.mensaje);
                    }
                })
                .catch(error => {
                    console.error('Error: ', error);
                });
    });
});
