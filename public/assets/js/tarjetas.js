$(document).ready(function () {
    $('#cardContainer').on('click', '.card', function () {
        var title = $(this).find('.card-title').text();
        var episodios = $(this).data('episodios');
        var descripcion = $(this).data('descripcion');
        var emision = $(this).data('emision');

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

        $('#animeModalLabel').text(title);
        $('#animeCalificacion').text('Apto para ' + calificacion);
        $('#animeEpisodios').text('Episodios:  ' + episodios);
        $('#animeEmision').text(emision);
        $('#animeDescripcion').text(descripcion);
        $('#animeModal').modal('show');
    });

    $('#cardContainer').on('click', '.guarda', function (event) {
        event.stopPropagation();

        estado_id = $(this).val();
        anime_id = $(this).data('anime');

        var params = new URLSearchParams();
        params.append('estado_id', estado_id);
        params.append('anime_id', anime_id);

        fetch('/agregarLista', {
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
                    } else {
                        console.log('Error: ', data.mensaje);
                    }
                })
                .catch(error => {
                    console.error('Error: ', error);
                });
    });
    
    $('#cardContainer').on('click', '.borra', function (event) { 
        event.stopPropagation();
        
        console.log('borra');
        
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
                        console.log('Éxito: ', data.mensaje);
                    } else {
                        console.log('Error: ', data.mensaje);
                    }
                })
                .catch(error => {
                    console.error('Error: ', error);
                });
    });
});

