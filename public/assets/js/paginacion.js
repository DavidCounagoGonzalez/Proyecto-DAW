document.addEventListener('DOMContentLoaded', function () {
            const rowsPerPage = 10;
            const table = document.getElementById('tabla').getElementsByTagName('tbody')[0];
            const rows = table.getElementsByTagName('tr');
            const totalPages = Math.ceil(rows.length / rowsPerPage);
            const pagination = document.getElementById('pagination');
            let currentPage = 1;

            function showPage(page) {
                const start = (page - 1) * rowsPerPage;
                const end = start + rowsPerPage;

                for (let i = 0; i < rows.length; i++) {
                    rows[i].style.display = (i >= start && i < end) ? '' : 'none';
                }

                updatePagination();
            }

            function createButton(text, page, isCurrent = false) {
                const button = document.createElement('button');
                button.textContent = text;
                button.className = 'btn-info';
                if (!isCurrent) {
                    button.addEventListener('click', function () {
                        currentPage = page;
                        showPage(currentPage);
                    });
                }
                return button;
            }

            function updatePagination() {
                pagination.innerHTML = '';

                if (currentPage > 1) {
                    pagination.appendChild(createButton('Primera', 1));
                    pagination.appendChild(createButton('Anterior', currentPage - 1));
                }

                const input = document.createElement('input');
                input.type = 'text';
                input.min = 1;
                input.max = totalPages;
                input.value = currentPage;
                input.classList.add('btn-primary','input-page');
                input.addEventListener('change', function () {
                    const newPage = parseInt(input.value);
                    if (newPage >= 1 && newPage <= totalPages) {
                        currentPage = newPage;
                        showPage(currentPage);
                    } else {
                        input.value = currentPage;
                    }
                });
                pagination.appendChild(input);

                if (currentPage < totalPages) {
                    pagination.appendChild(createButton('Siguiente', currentPage + 1));
                    pagination.appendChild(createButton('Última', totalPages));
                }
            }

            showPage(1);
        });