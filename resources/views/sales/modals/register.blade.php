<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">

        <form id="registerForm" action="{{ route('sales.store', ':id') }}" method="post">
            {{ csrf_field() }}

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Registrar Venta</h4>
                </div>
                <div class="modal-body">
                    <input name="id" id="productId" type="hidden" required>

                    <div class="form-group">
                        <label for="name">Nombre de producto</label>
                        <input name="name" id="name" type="text" class="form-control"  placeholder="Escriba y seleccione el producto..." required>
                    </div>

                    <div class="form-group">
                        <label for="count" class="control-label">Número de unidades</label>
                        <input name="count" id="count" type="number" class="form-control" placeholder="Ingrese cantidad" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
            </div>

        </form>

    </div>
</div>