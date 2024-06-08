class Pagination {
    constructor(cardContainer, paginationElement, options = {}) {
        this.cardContainer = cardContainer;
        this.paginationElement = paginationElement;
        this.cards = Array.from(this.cardContainer.getElementsByClassName('cardContainer'));
        this.cardsPerPage = options.cardsPerPage || 8;
        this.currentPage = parseInt(localStorage.getItem('paginaTarjetas')) || 1;
        this.filterFunction = options.filterFunction || (() => this.cards);
        this.filteredCards = this.cards;
    }

    init() {
        this.update();
    }

    showPage(page) {
        this.filteredCards = this.filterFunction();
        this.currentPage = page;
        
        // Guardar el número de página actual en el almacenamiento local
        localStorage.setItem('paginaTarjetas', page);
        
        const start = (page - 1) * this.cardsPerPage;
        const end = start + this.cardsPerPage;

        this.cards.forEach(card => card.style.display = 'none');
        this.filteredCards.slice(start, end).forEach(card => card.style.display = '');

        this.updatePagination();
    }

    createButton(text, page, isCurrent = false) {
        const button = document.createElement('button');
        button.textContent = text;
        if (isCurrent) {
            button.classList.add('btn-secondary', 'current-page');
        } else {
            button.classList.add('btn-info');
            button.addEventListener('click', () => this.showPage(page));
        }
        return button;
    }

    updatePagination() {
        this.paginationElement.innerHTML = '';

        const totalPages = Math.ceil(this.filteredCards.length / this.cardsPerPage);

        if (this.currentPage > 1) {
            this.paginationElement.appendChild(this.createButton('Primera', 1));
            this.paginationElement.appendChild(this.createButton('Anterior', this.currentPage - 1));
        }

        const input = document.createElement('input');
        input.type = 'text';
        input.min = 1;
        input.max = totalPages;
        input.value = this.currentPage;
        input.classList.add('btn-primary', 'input-page');
        input.addEventListener('change', () => {
            const newPage = parseInt(input.value);
            if (newPage >= 1 && newPage <= totalPages) {
                this.showPage(newPage);
            } else {
                input.value = this.currentPage;
            }
        });
        this.paginationElement.appendChild(input);

        if (this.currentPage < totalPages) {
            this.paginationElement.appendChild(this.createButton('Siguiente', this.currentPage + 1));
            this.paginationElement.appendChild(this.createButton('Última', totalPages));
        }
    }

    update() {
        this.showPage(this.currentPage);
    }
}
