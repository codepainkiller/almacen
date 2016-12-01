<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        <form id="registerForm" action="{{ route('compras.store') }}" method="post">
            {{ csrf_field() }}

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Registrar Compra</h4>
                </div>
                <div class="modal-body">
                    <input name="product_id" id="product_id" type="hidden" class="form-control" required>

                    <div class="form-group">
                        <label for="name">Nombre de producto</label>
                        <input name="name" id="name" type="text" class="form-control"  placeholder="Escriba y seleccione el producto..." required>
                    </div>

                    <div class="form-group">
                        <label for="units" class="control-label">Número de unidades</label>
                        <input name="units" type="number" min="1" class="form-control" placeholder="Ingrese cantidad" required>
                    </div>

                    <div class="form-group has-success">
                        <label for="price" class="control-label">Precio unitario de compra</label>
                        <input name="price" type="number" step="any" min="0" class="form-control" placeholder="Ingrese precio" required>
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