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

$('tbody').on('click', '.text-success', function () {
    var id = $(this).data('id');
    var form = $('#editForm');
    var url = form.attr('action').replace(':id', id);
    form.attr('action', url);

    $.get('/categorias/' + id, function (category) {
        $('#name').val(category.name);
        $('#editModal').modal('show');
    });
});

$('tbody').on('click', '.text-danger', function () {
    confirm($(this).data('id'));
});