function applyUserFilters(rows, filterNombre, filterEmail) {
    const nameText = filterNombre.value.toLowerCase();
    const emailText = filterEmail.value.toLowerCase();

    //recorremos las filas buscando que el valor de los elementos coincida con lo filtrado
    return rows.filter(row => {
        const cells = row.getElementsByTagName('td');
        const nameMatch = cells[1].textContent.toLowerCase().includes(nameText);
        const emailMatch = cells[2].textContent.toLowerCase().includes(emailText);

        return nameMatch && emailMatch;

    });
}

document.addEventListener('DOMContentLoaded', function () {
    const filterNombre = document.getElementById('filterNombre');
    const filterEmail = document.getElementById('filterEmail');
    const table = document.getElementById('tabla');
    const paginationElement = document.getElementById('pagination');

    const rows = Array.from(table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'));

    //Construimos un objeto basado en la clase de Paginación donde además le añadimos la función de filtros
    const pagination = new Pagination(table, paginationElement, {
        rowsPerPage: 15,
        filterFunction: () => applyUserFilters(rows, filterNombre, filterEmail)
    });
    
    function applyFiltersAndResetPagination() {
        pagination.update(); //Esto actualiza los botones de paginación si es necesario
        pagination.reset(); // Esto nso devuelve siempre a la primera página
    }

    filterNombre.addEventListener('input',applyFiltersAndResetPagination);
    filterEmail.addEventListener('input', applyFiltersAndResetPagination);

    pagination.init();
});



