
function confirm(id) {
    swal({
            title: "¿Esta seguro?",
            text: "Se eliminará permanentemente!",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, eliminar",
            closeOnConfirm: false
        },
        function(){
            var form = $('#destroy-form');
            var url = form.attr('action').replace(':id', id);
            form.attr('action', url);
            form.submit();
        });
}

var table = $('table').DataTable({
    "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
    },
    "order": [[0, 'desc']],
    "processing": true,
    "serverSide": true,
    "ajax": "api/products/datatable",
    "columns": [
        {data: 'id', name: 'products.id'},
        {data: 'name'},
        {data: 'sale_price'},
        {data: 'purchase_price'},
        {data: 'stock'},
        {data: 'sales'},
        {data: 'category.name', name: 'category.name'},
        {data: 'actions', name: 'actions', orderable: false, searchable: false}
    ]
});

$('tbody').on('click', '.text-warning', function () {
    $('#addStockForm').data('id', $(this).data('id'));
    $('#count').val(1);
    $('#nameCountLabel').html(
        'Unidades de <span class="text-success">' +
        $(this).data('name').toUpperCase() + '</span>:'
    );

    $('#addStockModal').modal('show');
});

$('tbody').on('click', '.text-success', function () {
    var id = $(this).data('id');
    var form = $('#editForm');
    var url = form.attr('action').replace(':id', id);
    form.attr('action', url);

    $.get('/products/' + id, function (product) {
        $('#name').val(product.name);
        $('#purchase_price').val(product.purchase_price);
        $('#stock').val(product.stock);
        $('#category_id').val(product.category_id);
        $('#sale_price').val(product.sale_price);

        $('#editModal').modal('show');
    });
});

$('tbody').on('click', '.text-danger', function () {
    confirm($(this).data('id'));
});

$('#addStockForm').submit(function (e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action').replace(':id', form.data('id'));

    $.post(url, form.serialize(),function (response) {
        console.log(response);
        $('#addStockModal').modal('hide');
        table.ajax.reload();
        swal({
            title: "Hecho!",
            text: "Se añadió las unidades al stock del producto",
            type: "success",
            timer: 1800,
            showConfirmButton: false
        });
    });
});