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
    $('.selectCustom').on('change', updateFiltersAndPagination);
    $('.selectGeneros').on('change', updateFiltersAndPagination);

    function updateFiltersAndPagination() {
        currentPage = 1;
        const filteredAnimes = filterAnimes();

        updatePagination(filteredAnimes);
        showPage(currentPage, filteredAnimes);
    }

    function filterAnimes() {
        const selectedTitulo = tituloFilter.value.toLowerCase();
        const selectedCalificacion = calificacionFilter.value;
        const selectedGeneros = Array.from(generosFilter.selectedOptions).map(option => option.value);
        const selectedEnEmision = enEmisionFilter.value;


        animesfiltrados = animesGeneros.filter(anime => {
            const titulo = anime.titulo.toLowerCase();
            const calificacion = anime.calificacion;
            const generos = anime.generos ? anime.generos.split(',') : [];
            const enEmision = anime.en_emision;

            let isVisible = true;

            if (selectedTitulo && !titulo.includes(selectedTitulo)) {
                isVisible = false;
            }
            if (selectedCalificacion && calificacion !== selectedCalificacion) {
                isVisible = false;
            }
            if (selectedEnEmision && enEmision !== parseInt(selectedEnEmision)) {
                isVisible = false;
            }
            if (selectedGeneros.length > 0 && !selectedGeneros.some(elemento => generos.includes(elemento))) {
                isVisible = false;
            }

            return isVisible;
        });


        return animesfiltrados;
    }

    function updatePagination(filteredAnimes) {
        paginationElement.innerHTML = '';
        const totalPages = Math.ceil(filteredAnimes.length / rowsPerPage);

        if (totalPages > 1) {
            const createButton = (text, page) => {
                const button = document.createElement('button');
                button.textContent = text;
                button.classList.add('btn-info');
                if (page === currentPage) {
                    button.classList.add('active');
                }
                button.addEventListener('click', () => {
                    showPage(page, filteredAnimes);
                });
                return button;
            };

            if (currentPage > 1) {
                paginationElement.appendChild(createButton('Primera', 1));
                paginationElement.appendChild(createButton('Anterior', currentPage - 1));
            }

            const input = document.createElement('input');
            input.type = 'text';
            input.min = 1;
            input.max = totalPages;
            input.value = currentPage;
            input.classList.add('btn-primary', 'input-page');
            input.addEventListener('change', () => {
                const newPage = parseInt(input.value);
                if (newPage >= 1 && newPage <= totalPages) {
                    showPage(newPage, filteredAnimes);
                } else {
                    input.value = currentPage;
                }
            });
            paginationElement.appendChild(input);

            if (currentPage < totalPages) {
                const nextPage = currentPage + 1;
                const nextButton = createButton('Siguiente', nextPage);
                paginationElement.appendChild(nextButton);
                paginationElement.appendChild(createButton('Última', totalPages));
            }
        }

    }

    function showPage(page, filteredAnimes) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const animesToShow = filteredAnimes.slice(start, end);
        currentPage = page;



        cardContainer.innerHTML = '';
        animesToShow.forEach(anime => {
            listas = anime.listas;
            const cardHtml = `
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mt-4 cardContainer anime-card" 
                     data-titulo="${anime.titulo}" 
                     data-calificacion="${anime.calificacion}" 
                     data-generos="${anime.generos}" 
                     data-enemision="${anime.en_emision}">
                    <div class="card mx-auto" style="background-image: url('${anime.imagenes}');"
                        data-descripcion="${anime.descripcion}" 
                        data-episodios="${anime.episodios}" 
                        data-enemision="${anime.en_emision}" 
                        data-emision="${anime.fecha_emision}" 
                        data-calificacion="${anime.calificacion}">
                        <div class="card-body-overlay">
                            <h5 class="card-title">${anime.titulo}</h5>
                            <div class="row text-center btn-acciones">
                                <div class="col-3">
                                    <button class="${(listas !== null && listas.includes(3)) ? 'borra' : 'guarda'}" value="3" data-anime="${anime.id}">
                                        <i class="fa-${(listas !== null && listas.includes(3)) ? 'solid' : 'regular'} fa-heart icon-guarda"></i>
                                    </button>
                                </div>
                                <div class="col-3">
                                    <button class="${(listas !== null && listas.includes(2)) ? 'borra' : 'guarda'}" value="2" data-anime="${anime.id}">
                                        <i class="fa-solid fa-check icon-guarda"></i>
                                    </button>
                                </div>
                                <div class="col-3">
                                    <button class="${(listas !== null && listas.includes(1)) ? 'borra' : 'guarda'}" value="1" data-anime="${anime.id}" ${(listas !== null && listas.includes(1)) ? 'checked' : ''}>
                                        <i class="fa-regular fa-eye icon-guarda"></i>
                                    </button>
                                </div>
                                <div class="col-3">
                                    <button class="${(listas !== null && listas.includes(4)) ? 'borra' : 'guarda'}" value="4" data-anime="${anime.id}">
                                        <i class="fa-regular fa-clock icon-guarda"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
            cardContainer.innerHTML += cardHtml;

        });
        updatePagination(filteredAnimes);
    }

    // Inicializar filtros y paginación
    updateFiltersAndPagination();
});
