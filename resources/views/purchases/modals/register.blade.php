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

                    <div class="form-group">
                        <label for="product_id">Nombre de producto</label>
                        <select name="product_id" class="selectpicker form-control " data-size="10" data-live-search="true" required>
                            <option value="" >Seleccione Producto</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="units" class="control-label">Número de unidades</label>
                        <input name="units" type="number" min="1" class="form-control" placeholder="Ingrese cantidad" required>
                    </div>

                    <div class="form-group">
                        <label for="price" class="control-label">Precio unitario de compra</label>
                        <input name="price" type="number" step="any" min="0" class="form-control" placeholder="Ingrese precio" required>
                    </div>
                    <div class="form-group">
                        <label for="purchased_at" class="control-label">Fecha de Compra</label>
                        <input name="purchased_at" id="purchased_at" type="text" class="form-control"
                               data-provide="datepicker"
                               data-date-end-date="0d">
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