function applyFilters(rows, filterNombre, filterEmail) {
    const nameText = filterNombre.value.toLowerCase();
    const emailText = filterEmail.value.toLowerCase();


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

    const pagination = new Pagination(table, paginationElement, {
        rowsPerPage: 15,
        filterFunction: () => applyFilters(rows, filterNombre, filterEmail)
    });

    filterNombre.addEventListener('input', () => pagination.update());
    filterEmail.addEventListener('input', () => pagination.update());

    pagination.init();
});



