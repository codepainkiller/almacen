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
/*
$('#name').select2({
    theme: "bootstrap"
});
*/
/*
$("#name2").easyAutocomplete({
    url: "sales/list-products",
    getValue: "name",
    list: {
        match: {
            enabled: true
        },
        onSelectItemEvent: function() {
            var product = $("#name").getSelectedItemData();
            $("#product_id").val(product.id).trigger("change");
        },
        onHideListEvent: function() {
            if (! $('#name').val()) {
                $("#product_id").val("").trigger("change");
            }
        }
    },
    ajaxSettings: {
        dataType: "json",
        method: "GET",
        data: {
            dataType: "json"
        }
    },
    //requestDelay: 250,
    theme: "bootstrap",
    adjustWidth: false
});
*/
$('[data-toggle="popover"]').popover();

$('tbody').on('click', '.text-danger', function () {
    console.log('Destroy id', $(this).data('id'));
    confirm($(this).data('id'));
});

