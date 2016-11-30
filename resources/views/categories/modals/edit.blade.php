<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        <form id="editForm" action="{{ route('categorias.update', ':id') }}" method="post">

            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar Categoria</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="control-label">Nombre</label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Ingrese nombre" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>

        </form>

    </div>
</div>