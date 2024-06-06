function applyFilters(rows, filterName, filterInEmision, filterRating) {
    const nameText = filterName.value.toLowerCase();
    const inEmision = filterInEmision.checked;
    const rating = filterRating.value;


    return rows.filter(row => {
        const cells = row.getElementsByTagName('td');
        const nameMatch = cells[0].textContent.toLowerCase().includes(nameText);
        const inEmisionMatch = !inEmision || cells[1].textContent.trim() === 'Si';
        const ratingMatch = !rating || cells[2].textContent.trim() === rating;
        return nameMatch && inEmisionMatch && ratingMatch;

    });
}

document.addEventListener('DOMContentLoaded', function () {
    const filterTitulo = document.getElementById('filterTitulo');
    const filterEmision = document.getElementById('filterEmision');
    const filterCalificacion = document.getElementById('filterCalificacion');
    const table = document.getElementById('tabla');
    const paginationElement = document.getElementById('pagination');

    const rows = Array.from(table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'));

    const pagination = new Pagination(table, paginationElement, {
        rowsPerPage: 15,
        filterFunction: () => applyFilters(rows, filterTitulo, filterEmision, filterCalificacion)
    });

    filterTitulo.addEventListener('input', () => pagination.update());
    filterEmision.addEventListener('change', () => pagination.update());
    $('.selectCustom').on('change', () => pagination.update());

    pagination.init();
});

