$(document).ready(function() {
    const moduleRoutes = window.moduleRoutes || {};

    $('.page').on('click', '.delete-button', function() {
        let id = $(this).attr('id');
        let url = moduleRoutes.destroyRoute.replace(':id', id);
        $('.page #delete-modal form').attr('action', url);
        $('.page #delete-modal').modal('show');
    });

    $('.page').on('change', '.custom-pagination select', function () {
        window.location = moduleRoutes.pageUrl + "&pagination=" + this.value;
    });

    function fetchFiltered(sortColumn = null, sortDirection = null) {
        let formObject = {};
        $('.filter-form').serializeArray().forEach(function (field) {
            formObject[field.name] = field.value;
        });

        if(sortColumn && sortDirection) {
            formObject.column = sortColumn;
            formObject.direction = sortDirection;
        }

        $.ajax({
            url: moduleRoutes.filterRoute,
            type: 'GET',
            data: formObject,
            success: function (response) {
                $('#tbody').html(response.tbody);
                $('#pagination').html(response.pagination);
            },
            error: function () {
                alert('Something went wrong while loading data.');
            }
        });
    }

    $('.filter-form input, .filter-form select').on('input change', function () {
        fetchFiltered();
    });

    $('.sort-icon').on('click', function () {
        let name = $(this).data('name');
        let orderBy = $(this).data('orderby');
        orderBy = orderBy === 'asc' ? 'desc' : 'asc';
        $(this).data('orderby', orderBy);
        fetchFiltered(name, orderBy);
    });

    $('.reset').on('click', function () {
        window.location = moduleRoutes.indexRoute;
    });
});