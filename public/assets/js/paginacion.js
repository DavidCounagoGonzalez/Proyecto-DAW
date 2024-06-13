class Pagination {
    constructor(table, paginationElement, options = {}) {
        this.table = table;
        this.paginationElement = paginationElement;
        this.rows = Array.from(this.table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'));
        this.rowsPerPage = options.rowsPerPage || 15;
        this.currentPage =  parseInt(localStorage.getItem('paginaTabla')) || 1;
        this.filterFunction = options.filterFunction || (() => this.rows);
        this.filteredRows = this.rows;
    }

    init() {
        this.update();
    }

    showPage(page) {
        this.filteredRows = this.filterFunction();
        this.currentPage = page;
        
        localStorage.setItem('paginaTabla', page); //Guardamos la página en que se quedo.
        
        const start = (page - 1) * this.rowsPerPage;
        const end = start + this.rowsPerPage;

        this.rows.forEach(row => row.style.display = 'none'); //Oculta todas las filas
        this.filteredRows.slice(start, end).forEach(row => row.style.display = ''); //Muestra las filas de la página actual

        this.updatePagination();
    }
    
    //Creación de los botones con clases y eventos
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
        this.paginationElement.innerHTML = ''; //Siempre se vacía por si los botones del inicio o final deben desaparecer.

        const totalPages = Math.ceil(this.filteredRows.length / this.rowsPerPage);
        
        //Creación botones para ir hacia atrás
        if (this.currentPage > 1) {
            this.paginationElement.appendChild(this.createButton('Primera', 1));
            this.paginationElement.appendChild(this.createButton('Anterior', this.currentPage - 1));
        }

        //Creación del botón de Página Actual que permite escribir para indicar la página a la que ir
        const input = document.createElement('input');
        input.type = 'text';
        input.min = 1;
        input.max = totalPages;
        input.setAttribute("aria-label", "página-actual");
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
        
        //Creación de botones para ir hacía delante
        if (this.currentPage < totalPages) {
            this.paginationElement.appendChild(this.createButton('Siguiente', this.currentPage + 1));
            this.paginationElement.appendChild(this.createButton('Última', totalPages));
        }
    }

    update() {
        this.showPage(this.currentPage);
    }
    
    reset() {
        this.currentPage = 1;
        this.update();
    }
}
