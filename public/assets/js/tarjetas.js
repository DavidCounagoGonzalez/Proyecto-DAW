$(document).ready(function () {
                $('.card').click(function () {
                    var title = $(this).find('.card-title').text();
                    var description = $(this).find('.card-text').text();
                    $('#animeModalLabel').text(title);
                    $('#animeDescription').text(description);
                    $('#animeModal').modal('show');
                });
                
                $('.guarda').click(function(event){
                    event.stopPropagation();
                    console.log('hola');
                });
            });

