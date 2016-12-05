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

$('table').dataTable({
    "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
    },
    "order": [[0, 'desc']]
});

$('[data-toggle="popover"]').popover();

$('tbody').on('click', '.text-danger', function () {
    console.log('Destroy id', $(this).data('id'));
    confirm($(this).data('id'));
});

