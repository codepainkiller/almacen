var table = $('table').DataTable({
    "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
    },
    "order": [[3, 'desc']],
    "processing": true,
    "serverSide": true,
    "ajax": "sales/datatable",
    "columns": [
        {data: 'id'},
        {data: 'name'},
        {data: 'purchase_price'},
        {data: 'sale_price'},
        {data: 'sales'},
        {data: 'income', orderable: true},
        {data: 'earnings', orderable: true}
    ]
});

$("#name").easyAutocomplete({
    url: "sales/list-products",
    getValue: "name",
    template: {
        type: "custom",
        method: function(value, item) {
            return "<strong>"+ value +"</strong>" +
                "<code class='pull-right'>" + parseFloat(item.sale_price).toFixed(2) + "</code>";
        }
    },
    list: {
        match: {
            enabled: true
        },
        onSelectItemEvent: function() {
            var product = $("#name").getSelectedItemData();
            $("#productId").val(product.id).trigger("change");
        },
        onHideListEvent: function() {
            if (! $('#name').val()) {
                $("#productId").val("").trigger("change");
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

$('#registerForm').submit(function (e) {
    e.preventDefault();

    var id = $('#productId').val();
    var form = $(this);
    var url = form.attr('action').replace(':id', id);

    $.post(url, form.serialize(), function (response) {
        console.log(response);
        $('#registerModal').modal('hide');

        if (response.code == 202) {
            swal({
                title: "Regitrado!",
                text: response.message,
                type: "success",
                timer: 1800,
                showConfirmButton: false
            });
            table.ajax.reload();
        } else if (response.code == 412) {
            swal({
                title: "Cantidad no disponible",
                text: response.message,
                type: "warning",
                //timer: 1800,
                showConfirmButton: true
            });
        } else {
            swal({
                title: "Algo salio mal!",
                text: response.message,
                type: "error",
                //timer: 1800,
                showConfirmButton: true
            });
        }
    });
});

$('#registerModal').on('show.bs.modal', function (e) {
    $('#productId').val("");
    $('#name').val("");
    $('#count').val(1);
});