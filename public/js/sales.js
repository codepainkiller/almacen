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
        {data: 'sale_price'},
        {data: 'sales'},
        {data: 'subtotal'}
    ]
});