$("#name").easyAutocomplete({
    url: "sales/list-products",
    getValue: "name",
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
