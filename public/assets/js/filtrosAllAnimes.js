document.addEventListener('DOMContentLoaded', function () {
    const tituloFilter = document.getElementById('filtroTitulo');
    const calificacionFilter = document.getElementById('filtroCalificacion');
    const generosFilter = document.getElementById('selectGeneros');
    const enEmisionFilter = document.getElementById('filtroEnEmision');
    const cardContainer = document.getElementById('cardContainer');
    const paginationElement = document.getElementById('pagination');
    const rowsPerPage = 18;
    let currentPage = 1;

    // Añadir eventos de cambio a los filtros
    tituloFilter.addEventListener('input', updateFiltersAndPagination);
    calificacionFilter.addEventListener('change', updateFiltersAndPagination);
    generosFilter.addEventListener('change', updateFiltersAndPagination);
    enEmisionFilter.addEventListener('change', updateFiltersAndPagination);

    function updateFiltersAndPagination() {
        currentPage = 1;
        const filteredAnimes = filterAnimes();
        updatePagination(filteredAnimes);
    }

    function filterAnimes() {
        const selectedTitulo = tituloFilter.value.toLowerCase();
        const selectedCalificacion = calificacionFilter.value;
        const selectedGeneros = Array.from(generosFilter.selectedOptions).map(option => option.value);
        const selectedEnEmision = enEmisionFilter.value;



        return animes.filter(anime => {
            const titulo = anime.titulo.toLowerCase();
            const calificacion = anime.calificacion;
            const generos = anime.generos ? anime.generos.split(',') : [];
            const enEmision = anime.en_emision;

            let isVisible = true;

            if (selectedTitulo && !titulo.includes(selectedTitulo)) {
                isVisible = false;
            }

            return isVisible;
        });
    }

    function updatePagination(filteredAnimes) {
        paginationElement.innerHTML = '';
        const totalPages = Math.ceil(filteredAnimes.length / rowsPerPage);

        if (totalPages > 1) {
            const createButton = (text, page) => {
                const button = document.createElement('button');
                button.textContent = text;
                button.classList.add('btn', 'btn-primary', 'm-1');
                if (page === currentPage) {
                    button.classList.add('active');
                }
                button.addEventListener('click', () => {
                    currentPage = page;
                    showPage(page, filteredAnimes);
                });
                return button;
            };

            if (currentPage > 1) {
                paginationElement.appendChild(createButton('Primera', 1));
                paginationElement.appendChild(createButton('Anterior', currentPage - 1));
            }

            for (let i = 1; i <= totalPages; i++) {
                paginationElement.appendChild(createButton(i, i));
            }

            if (currentPage < totalPages) {
                paginationElement.appendChild(createButton('Siguiente', currentPage + 1));
                paginationElement.appendChild(createButton('Última', totalPages));
            }
        }

        showPage(currentPage, filteredAnimes);
    }

    function showPage(page, filteredAnimes) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const animesToShow = filteredAnimes.slice(start, end);
        currentPage = page;
        
        console.log(currentPage);

        cardContainer.innerHTML = '';
        animesToShow.forEach(anime => {
            const cardHtml = `
                <div class="col-md-6 col-lg-3 mt-4 cardContainer anime-card" 
                     data-titulo="${anime.titulo}" 
                     data-calificacion="${anime.calificacion}" 
                     data-generos="${anime.generos ? anime.generos.join(',') : ''}" 
                     data-enemision="${anime.en_emision}">
                    <div class="card mx-auto" style="background-image: url('${anime.imagenes}');"
                        data-descripcion="${anime.descripcion}" 
                        data-episodios="${anime.episodios}" 
                        data-enemision="${anime.en_emision}" 
                        data-emision="${anime.fecha_emision}" 
                        data-calificacion="${anime.calificacion}">
                        <div class="card-body-overlay">
                            <h5 class="card-title">${anime.titulo}</h5>
                            <button class="btn btn-info guarda">Hola</button>
                        </div>
                    </div>
                </div>`;
            cardContainer.innerHTML += cardHtml;
        });
    }

    // Inicializar filtros y paginación
    updateFiltersAndPagination();
});
