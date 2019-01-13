<div id="responsive-modal" class="modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="top:10%;left:-20%;width:50%;right:0%;">
        <div class="modal-content" style="min-width:260px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">¿Que desea hacer?</h4>
            </div>
            <div class="modal-body">
                <button type='submit' onclick="window.location.href='/servicio/agregar'" class="btn btn-primary">Agregar reporte de servicio</button>
                <button type='submit' onclick="window.location.href='/seguridad/agregar'" class="btn btn-info">Agregar reporte de seguridad</button>
                @if (Auth::user()->role->name == 'Administrador de Comunidad')
                    <button type='submit' onclick="window.location.href='/noticia/agregar'" class="btn btn-warning">Agregar noticia</button>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<button data-toggle="modal" data-target="#responsive-modal" class="btn btn-success">Agregar Reporte</button>