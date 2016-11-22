<div id="addStockModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="addStockForm" action="{{ route('products.addStock', ':id') }}" method="post">
                {{ csrf_field() }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Añadir al almacén</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="count" id="nameCountLabel">Unidades:</label>
                        <input id="count" name="count" type="number" class="form-control" value="1" required>
                        <span class="help-block">Esta cantidad se sumará al stock existente de este producto.</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Añadir unidades</button>
                </div>
            </form>
        </div>
    </div>
</div>