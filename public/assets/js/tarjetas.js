$(document).ready(function () {
                $('.card').click(function () {
                    var title = $(this).find('.card-title').text();
                    var episodios = $(this).data('episodios');
                    var descripcion = $(this).data('descripcion');
                    var emision = $(this).data('emision');
                    
                    if($(this).data('enEmision')){
                        emision = 'En emisión desde el ' + emision; 
                    }else{
                        emision = 'Emitido desde el ' + emision;
                    }
                    
                    if($(this).data('calificacion') === 'TP'){
                        calificacion = 'todos los públicos';
                    }else{
                        calificacion = '+' + $(this).data('calificacion');
                    }
                    
                    $('#animeModalLabel').text(title);
                    $('#animeCalificacion').text('Apto para ' + calificacion);
                    $('#animeEpisodios').text('Episodios:  ' + episodios);
                    $('#animeEmision').text(emision);
                    $('#animeDescripcion').text(descripcion);
                    $('#animeModal').modal('show');
                });
                
                $('.guarda').click(function(event){
                    event.stopPropagation();
                    console.log('hola');
                });
            });

