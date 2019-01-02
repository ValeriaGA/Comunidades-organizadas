@extends('administration.layouts.master')

@section('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="row-fluid">
    </div>
    <hr />
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
          <h5>Administracion</h5>
        </div>
        <div class="widget-content">
          <div class="todo">
            <ul>
              <li class="clearfix">
                <div class="txt"> Agregar/Eliminar incidencias reportadas <span class="by label">Funcionalidad</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Publicaciones <span class="by label">Funcionalidad</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Inspeccionar una publicacion <span class="by label">Funcionalidad</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Activar/Desactivar publicacion <span class="by label">Funcionalidad</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Block Users <span class="by label">Funcionalidad y Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Admin Logs [Triggers]<span class="by label">Funcionalidad y Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Paginate? <span class="by label">Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> # en sidebar esta en base a reportes [Cambiar a solicitudes] <span class="by label">Funcionalidad</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Arreglar el search <span class="by label">Funcionalidad</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Solicitudes de comunidades <span class="by label">Funcionalidad y Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
          <h5>Usuarios Regulares</h5>
        </div>
        <div class="widget-content">
          <div class="todo">
            <ul>
              <li class="clearfix">
                <div class="txt"> Crear/Editar Comentarios <span class="by label">Funcionalidad y Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Seguir/Dejar de seguir una comunidad <span class="by label">Funcionalidad y Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Solicitudes de comunidades <span class="by label">Funcionalidad y Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Mostrar evidencia en reportes/noticias (publicaciones)<span class="by label">Funcionalidad y Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Modulo de Search <span class="by label">Funcionalidad y Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Estadisticas <span class="by label">Funcionalidad y Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Advertir si un contenido en una publicacion es grafico (NSFW) <span class="by label">Funcionalidad y Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> subir archivos con tipo incorrecto (validar al crear/editar reportes/noticias) <span class="by label">Funcionalidad y Diseño</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Al equivocarse creando un reporte que no se borren todos los datos cuando le retorna los errores <span class="by label">Bugs</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Editando publicacion -> evidencias se borran las que se tenia guardado <span class="by label">Bugs</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Agregar un gate para que solo el usuario que creo la publicacion pueda verla si esta desactivada (actualmente otras personas la pueden ver si van al url de la publicacion) <span class="by label">Bugs</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
          <h5>General</h5>
        </div>
        <div class="widget-content">
          <div class="todo">
            <ul>
              <li class="clearfix">
                <div class="txt"> Usuarios bloqueados <span class="by label">Diseño y Funcionalidad</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
              <li class="clearfix">
                <div class="txt"> Cambiar los flash messages a toast js <span class="by label">QoL</span></div>
                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection